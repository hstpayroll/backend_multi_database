<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubDepartment
 *
 * @property $id
 * @property $name
 * @property $department_id
 * @property $company_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Company $company
 * @property Department $department
 * @property Employee[] $employees
 * @property Position[] $positions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SubDepartment extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
        'department_id' => 'required',
    ];


    protected $fillable = ['name','department_id'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'sub_department_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function positions()
    {
        return $this->hasMany(Position::class, 'sub_department_id', 'id');
    }


}
