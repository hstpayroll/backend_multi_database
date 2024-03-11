<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{

    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'value'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
