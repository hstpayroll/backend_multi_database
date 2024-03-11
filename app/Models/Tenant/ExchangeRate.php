<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ExchangeRate
 *
 * @property $id
 * @property $from_currency_id
 * @property $to_currency_id
 * @property $start_date
 * @property $end_date
 * @property $rate
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Currency $currency
 * @property Currency $currency
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExchangeRate extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'from_currency_id',
        'to_currency_id',
        'start_date',
        'end_date',
        'rate',
        'status'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, 'id', 'from_currency_id');
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'id', 'to_currency_id');
    }
}
