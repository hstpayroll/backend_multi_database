<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllowanceType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'main_allowance_id',
        'name',
        'taxability',
        'tax_free_amount',
        'value_type',
        'value',
        'status'
    ];

    public function mainAllowance()
    {
        return $this->belongsTo(MainAllowance::class);
    }

    //revers relationship
    public function allowanceTransactions()
    {
        return $this->hasMany(AllowanceTransaction::class);
    }
}
