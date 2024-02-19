<?php

namespace App\Models\Tenant;

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

    static $rules = [
		'loan_id' => 'required',
		'amount_payed' => 'required',
		'outstanding_amount' => 'required',
		'is_partial' => 'required',
		'is_missed' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['loan_id','amount_payed','outstanding_amount','is_partial','is_missed'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function loan()
    {
        return $this->hasOne(Loan::class, 'id', 'loan_id');
    }


}
