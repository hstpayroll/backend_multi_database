<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanySetting extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'description', 'value'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id'); // Specify the foreign key
    }
    
    public function companyDetail()
    {
        return $this->hasOne(Company::class, 'id', 'company_id'); // Specify the foreign key and local key
    }
}


