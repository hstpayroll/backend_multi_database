<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmploymentType
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
class EmploymentType extends Model
{
    protected $table = 'employment_types';

    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'employment_type_id', 'id');
    }
}
