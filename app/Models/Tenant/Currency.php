<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    static $rules = [
        'code' => 'required',
        'name' => 'required',
        'is_default' => 'required',
    ];

    protected $perPage = 20;


    protected $fillable = ['code', 'name', 'is_default'];


    public function companies(): HasMany
    {
        return $this->hasMany(Company::class, 'currency_id', 'id');
    }

    public function toCurrency(): HasMany
    {
        return $this->hasMany(ExchangeRate::class, 'to_currency_id', 'id');
    }

    public function fromCurrency(): HasMany
    {
        return $this->hasMany(ExchangeRate::class, 'from_currency_id', 'id');
    }
}
