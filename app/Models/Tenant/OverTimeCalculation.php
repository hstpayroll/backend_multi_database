<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverTimeCalculation extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    protected $fillable = ['employee_id','over_time_type_id','ot_date','ot_hour','ot_value'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function overTimeType()
    {
        return $this->belongsTo(OverTimeType::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'over_time_calculation_id');
    }
}
