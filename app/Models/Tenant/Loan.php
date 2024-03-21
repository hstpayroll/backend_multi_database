<?php

namespace App\Models\Tenant;

use App\Enums\LoanStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('status', function (Builder $builder) {
    //         $builder->where('status', 1);
    //     });
    // }

    use SoftDeletes;


    protected $fillable = [
        'employee_id',
        'loan_type_id',
        'name',
        'amount',
        'start_date',
        'expected_end_date',
        'duration_months',
        'monthly_installment',
        'description',
        'status',
        'termination_date'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function loanPaymentRecords()
    {
        return $this->hasMany(LoanPaymentRecord::class, 'loan_id', 'id');
    }

    public function loanType()
    {
        return $this->belongsTo(LoanType::class, 'loan_type_id', 'id');
    }
}
