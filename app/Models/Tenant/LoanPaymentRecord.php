<?php

namespace App\Models\Tenant;

use App\Models\Tenant\PayrollPeriod;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;


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

    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class);
    }
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1); // Assuming 'active' is represented by status 1
    }
}
