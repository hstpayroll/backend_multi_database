<?php

namespace App\Models;

use App\Models\MainAllowance;
use App\Models\AllowanceTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AllowanceType
 *
 * @property $id
 * @property $main_allowance_id
 * @property $name
 * @property $taxability
 * @property $tax_free_amount
 * @property $value_type
 * @property $status
 * @property $company_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property AllowanceTransaction[] $allowanceTransactions
 * @property Company $company
 * @property MainAllowance $mainAllowance
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AllowanceType extends Model
{
    use SoftDeletes;

    static $rules = [
		'main_allowance_id' => 'required',
		'name' => 'required',
		'taxability' => 'required',
		'tax_free_amount' => 'required',
		'value_type' => 'required',
		'status' => 'required',
		'company_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['main_allowance_id','name','taxability','tax_free_amount','value_type','status','company_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allowanceTransactions()
    {
        return $this->hasMany(AllowanceTransaction::class, 'allowance_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainAllowance()
    {
        return $this->hasOne(MainAllowance::class, 'id', 'main_allowance_id');
    }


}
