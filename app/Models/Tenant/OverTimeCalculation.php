<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OverTimeCalculation extends Model
{
    use SoftDeletes;

    static $rules = [
        'employee_id' => 'required',
        'over_time_type_id' => 'required',
        'ot_date' => 'required',
        'ot_hour' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'over_time_type_id', 'ot_date', 'ot_hour', 'ot_value'];



    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function overTimeType()
    {
        return $this->hasOne(OverTimeType::class, 'id', 'over_time_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'over_time_calculation_id', 'id');
    }
}
