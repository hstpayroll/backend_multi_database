<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Employee;
use App\Models\Tenant\PayrollPeriod;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LoanPaymentRecord
 *
 * @property $id
 * @property $employee_id
 * @property $loan_id
 * @property $amount_payed
 * @property $outstanding_amount
 * @property $is_partial
 * @property $is_missed
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property Loan $loan
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LoanPaymentRecord extends Model
{


    protected $fillable = [
        'payroll_period_id',
        'loan_id',
        'amount_payed',
        'outstanding_amount',
        'is_partial',
        'is_missed'
    ];


    public function loan()
    {
        return $this->belongsTo(Loan::class);
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
