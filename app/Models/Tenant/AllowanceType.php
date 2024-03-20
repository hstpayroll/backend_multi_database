<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'allowance_type_employee', 'allowance_type_id', 'employee_id')
            ->withPivot(['number_of_days', 'value_in_birr']);
    }
}
