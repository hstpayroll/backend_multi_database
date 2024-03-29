<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyPension
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $rate
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CompanyPension extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'rate', 'start_date', 'end_date', 'status'];
    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class);
    }
}
