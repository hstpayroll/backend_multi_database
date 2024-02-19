<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LoanType
 *
 * @property $id
 * @property $name
 * @property $company_id
 * @property $note
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Company $company
 * @property LoanRate[] $loanRates
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LoanType extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
		'company_id' => 'required',
		'rate' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','company_id','rate','note'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */



}
