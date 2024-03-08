<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OverTimeType extends Model
{
    use SoftDeletes;

    static $rules = [
        'name' => 'required',
        'rate' => 'required',
    ];


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'rate'];


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
    public function overTimeCalculations()
    {
        return $this->belongsTo(OverTimeCalculation::class, 'over_time_type_id', 'id');
    }
}
