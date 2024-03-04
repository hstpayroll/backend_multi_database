<?php

namespace App\Models\Tenant;

use App\Models\Tenant\AllowanceType;
use App\Models\Tenant\Employee;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AllowanceTransaction
 *
 * @property $id
 * @property $payroll_date
 * @property $employee_id
 * @property $allowance_type_id
 * @property $amount
 * @property $taxable_amount
 * @property $non_taxable_amount
 * @property $is_day_based
 * @property $start_date
 * @property $created_at
 * @property $updated_at
 *
 * @property AllowanceType $allowanceType
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AllowanceTransaction extends Model
{

    protected $fillable = ['payroll_period_id', 'employee_id', 'allowance_type_id', 'amount', 'taxable_amount', 'non_taxable_amount', 'is_day_based', 'start_date'];


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
}
