<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Citizenship
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee[] $employees
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Citizenship extends Model
{

    protected $fillable = ['name'];


    public function employees()
    {
        return $this->hasMany(Employee::class, 'citizenship_id', 'id');
    }


}
