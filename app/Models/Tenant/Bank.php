<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Employee;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name','swift'];

    static $rules = [
		'name' => 'required',
		'swift' => 'required',
    ];

    protected $perPage = 20;

    public function employees()
    {
        return $this->hasMany(Employee::class, 'bank_id', 'id');
    }


}
