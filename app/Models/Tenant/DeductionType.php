<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Deduction;
use App\Models\Tenant\MainDeduction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeductionType extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'description',
    // ];

    protected $fillable = [
        'main_deduction_id',
        'name',
        'description',
        'is_continuous',
        'is_employee_specific',
        'value_type',
        'value',
        'status',
    ];

    public function mainDeduction()
    {
        return $this->belongsTo(MainDeduction::class);
    }

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }
}
