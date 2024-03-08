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
        'start_date'
    ];


    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class, 'id', 'payroll_period_id');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'id', 'employee_id');
    }

    public function allowanceTypes()
    {
        return $this->hasMany(AllowanceType::class, 'id', 'allowance_type_id');
    }
    public function mainAllowance()
    {
        return $this->hasMany(mainAllowance::class, 'id', 'allowance_type_id');
    }
}
