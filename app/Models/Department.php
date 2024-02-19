<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 *
 * @property $id
 * @property $name
 * @property $company_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Company $company
 * @property Employee[] $employees
 * @property SubDepartment[] $subDepartments
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Department extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
		'company_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','company_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDepartments()
    {
        return $this->hasMany(SubDepartment::class, 'department_id', 'id');
    }


}
