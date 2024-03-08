<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{

    use HasFactory;

    protected $fillable = ['company_id', 'name', 'description', 'value'];

    public function company()
    {
        return $this->hasMany(Company::class,'id' ,'company_id'); // Specify the foreign key
    }

    // public function companyDetail()
    // {
    //     return $this->hasOne(Company::class, 'id', 'company_id'); // Specify the foreign key and local key
    // }
}
