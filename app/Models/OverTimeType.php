<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OverTimeType
 *
 * @property $id
 * @property $name
 * @property $rate
 * @property $company_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Company $company
 * @property OverTimeCalculation[] $overTimeCalculations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OverTimeType extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
		'rate' => 'required',
		'company_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','rate','company_id'];


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
    public function overTimeCalculations()
    {
        return $this->hasMany(OverTimeCalculation::class, 'over_time_type_id', 'id');
    }


}
