<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllowanceType extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    protected $fillable = [
        'main_allowance_id',
        'name',
        'taxability',
        'tax_free_amount',
        'value_type',
        'status'
    ];

    public function allowanceTransactions(): HasMany
    {
        return $this->hasMany(AllowanceTransaction::class, 'allowance_type_id', 'id');
    }

    public function mainAllowance()
    {
        return $this->belongsTo(MainAllowance::class, 'main_allowance_id');
    }
}
