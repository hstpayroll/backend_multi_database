<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Loan
 *
 * @property $id
 * @property $employee_id
 * @property $loan_type_id
 * @property $amount
 * @property $start_date
 * @property $expected_end_date
 * @property $duration_months
 * @property $description
 * @property $status
 * @property $termination_date
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Employee $employee
 * @property LoanPaymentRecord[] $loanPaymentRecords
 * @property LoanType $loanType
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Loan extends Model
{
    use SoftDeletes;

    static $rules = [
		'employee_id' => 'required',
		'loan_type_id' => 'required',
		'amount' => 'required',
		'start_date' => 'required',
		'expected_end_date' => 'required',
		'duration_months' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id','loan_type_id','amount','start_date','expected_end_date','duration_months','description','status','termination_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanPaymentRecords()
    {
        return $this->hasMany(LoanPaymentRecord::class, 'loan_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function loanType()
    {
        return $this->hasOne(LoanType::class, 'id', 'loan_type_id');
    }


}
