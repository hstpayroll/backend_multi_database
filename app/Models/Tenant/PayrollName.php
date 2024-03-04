<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PayrollName
 *
 * @property $id
 * @property $name
 * @property $start_date
 * @property $end_date
 * @property $details
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property IncomeTax[] $incomeTaxes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PayrollName extends Model
{
    use SoftDeletes;

    static $rules = [
        'name' => 'required',
        'start_date' => 'required',
        'details' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'start_date', 'end_date', 'details', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomeTaxes()
    {
        return $this->hasMany(IncomeTax::class, 'payroll_name_id', 'id');
    }
}
