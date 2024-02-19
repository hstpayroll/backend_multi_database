<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmployeePension
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $rate
 * @property $start_date
 * @property $end_date
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmployeePension extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
		'rate' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','rate','start_date','end_date','status'];



}
