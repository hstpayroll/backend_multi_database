<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientRequests extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email',  
        'phone_number', 
        'company_name', 
        'total_number_of_employees', 
        'country', 
        'city', 
        'sub_city',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
