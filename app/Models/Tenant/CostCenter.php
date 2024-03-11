<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;


class CostCenter extends Model
{

    static $rules = [
        'code' => 'required',
        'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'description', 'status'];
}
