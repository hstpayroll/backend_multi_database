<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeductionTransaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'payroll_period_id',
        'employee_id',
        'deduction_id',
        'amount_deducted',
        'outstanding_amount',
        'is_partial',
        'is_missed',
        'start_date',
    ];

    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function deduction()
    {
        return $this->belongsTo(Deduction::class);
    }
}
