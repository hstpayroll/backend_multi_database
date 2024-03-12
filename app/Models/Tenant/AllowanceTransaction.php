<?php

namespace App\Models\Tenant;

use App\Models\Tenant\AllowanceType;
use App\Models\Tenant\Employee;
use Illuminate\Database\Eloquent\Model;

class AllowanceTransaction extends Model
{

    protected $fillable = [
        'payroll_period_id',
        'employee_id',
        'allowance_type_id',
        'amount',
        'taxable_amount',
        'non_taxable_amount',
        'is_day_based',
        'number_of_date'
    ];


    public function payrollPeriods()
    {
        return $this->belongsTo(PayrollPeriod::class);
    }
    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }

    public function allowanceTypes()
    {
        return $this->belongsTo(AllowanceType::class);
    }
    public function mainAllowances()
    {
        return $this->belongsTo(mainAllowance::class);
    }
}
