<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PayrollType
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PayrollType extends Model
{


    protected $fillable = ['name'];

    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class);
    }
}
