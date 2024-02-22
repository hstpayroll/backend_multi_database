<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TaxRegion
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Employee[] $employees
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TaxRegion extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'tax_region_id', 'id');
    }
}
