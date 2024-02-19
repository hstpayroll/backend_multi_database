<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OverTimeCalculation
 *
 * @property $id
 * @property $company_id
 * @property $employee_id
 * @property $over_time_type_id
 * @property $ot_date
 * @property $ot_hour
 * @property $ot_value
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Company $company
 * @property Employee $employee
 * @property OverTimeType $overTimeType
 * @property Payroll[] $payrolls
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
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
    protected $fillable = ['employee_id','over_time_type_id','ot_date','ot_hour','ot_value'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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
