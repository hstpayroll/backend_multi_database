<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email',  
        'phone_number', 
        'company_name', 
        'total_number_of_employee', 
        'country', 
        'city', 
        'sub_city',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
