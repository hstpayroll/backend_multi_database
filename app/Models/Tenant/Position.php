<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Position
 *
 * @property $id
 * @property $name
 * @property $sub_department_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 * @property Employee[] $employees
 * @property SubDepartment $subDepartment
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Position extends Model
{



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'sub_department_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'position_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subDepartment()
    {
        return $this->hasOne(SubDepartment::class, 'id', 'sub_department_id');
    }
}
