<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\AllowanceType;
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

    static $rules = [
		'employee_id' => 'required',
		'allowance_type_id' => 'required',
		'amount' => 'required',
		'taxable_amount' => 'required',
		'non_taxable_amount' => 'required',
		'is_day_based' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['payroll_date','employee_id','allowance_type_id','amount','taxable_amount','non_taxable_amount','is_day_based','start_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function allowanceType()
    {
        return $this->hasOne(AllowanceType::class, 'id', 'allowance_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }


}
