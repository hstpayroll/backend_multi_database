<?php

namespace App\Models\Tenant;

use App\Enums\LoanStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'employee_id',
        'loan_type_id',
        'amount',
        'start_date',
        'expected_end_date',
        'duration_months',
        'description',
        'status',
        'termination_date'
    ];
    protected $casts = [
        'status' => LoanStatusEnum::class, // Cast the status to LoanStatusEnum
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
