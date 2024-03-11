<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Deduction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeductionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function deductions()
    {
        return $this->hasMany(Deduction::class);
    }
}
