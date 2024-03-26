<?php

namespace App\Models\Tenant;

use App\Models\Tenant\DeductionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainDeduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function deductionTypes()
    {
        return $this->hasMany(DeductionType::class);
    }
}
