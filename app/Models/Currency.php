<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 *
 * @property $id
 * @property $code
 * @property $name
 * @property $is_default
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Company[] $companies
 * @property ExchangeRate[] $exchangeRates
 * @property ExchangeRate[] $exchangeRates
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Currency extends Model
{
    use SoftDeletes;

    static $rules = [
		'code' => 'required',
		'name' => 'required',
		'is_default' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name','is_default'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'currency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function toCurrency()
    {
        return $this->hasMany(ExchangeRate::class, 'to_currency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fromCurrency()
    {
        return $this->hasMany(ExchangeRate::class, 'from_currency_id', 'id');
    }


}
