<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PayrollPeriod
 *
 * @property $id
 * @property $income_tax_id
 * @property $name
 * @property $year
 * @property $start_date
 * @property $end_date
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PayrollPeriod extends Model
{
    use SoftDeletes;

    static $rules = [
		'income_tax_id' => 'required',
		'name' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['income_tax_id','name','year','start_date','end_date','status'];



}
