<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IncomeTax
 *
 * @property $id
 * @property $payroll_name_id
 * @property $name
 * @property $min_income
 * @property $max_income
 * @property $tax_rate
 * @property $deduction
 * @property $details
 * @property $details2
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Payroll[] $payrolls
 * @property PayrollName $payrollName
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class IncomeTax extends Model
{
    use SoftDeletes;

    static $rules = [
		'payroll_name_id' => 'required',
		'name' => 'required',
		'min_income' => 'required',
		'tax_rate' => 'required',
		'deduction' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['payroll_name_id','name','min_income','max_income','tax_rate','deduction','details','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'income_taxe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payrollName()
    {
        return $this->hasOne(PayrollName::class, 'id', 'payroll_name_id');
    }


}
