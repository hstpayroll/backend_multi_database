<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OverTimeCalculation extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'employee_id',
        'over_time_type_id',
        'payroll_period_id',
        'ot_hour',
        'ot_value'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }

    public function overTimeTypes()
    {
        return $this->hasMany(OverTimeType::class, 'id', 'over_time_type_id');
    }

    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class, 'id', 'payroll_period_id');
    }
}
