<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Builder;
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
        'ot_value',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function overTimeType()
    {
        return $this->belongsTo(OverTimeType::class);
    }

    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class);
    }
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1); // Assuming 'active' is represented by status 1
    }
}
