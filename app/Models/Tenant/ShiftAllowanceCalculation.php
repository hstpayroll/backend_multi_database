<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftAllowanceCalculation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'shift_allowance_type_id',
        'payroll_period_id',
        'value',
        'status',
    ];




    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
