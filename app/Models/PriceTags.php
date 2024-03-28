<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTags extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'minimum_employee',
        'maximum_employee',
        'price',
        'description',
        'status',
    ];

    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at',
    // ];
}
