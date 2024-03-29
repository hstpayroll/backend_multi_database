<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MainAllowance
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property AllowanceType[] $allowanceTypes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MainAllowance extends Model
{
    use SoftDeletes;


    protected $fillable = ['name', 'description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allowanceTypes()
    {
        return $this->hasMany(AllowanceType::class, 'main_allowance_id', 'id');
    }
}
