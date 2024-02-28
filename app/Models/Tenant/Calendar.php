<?php

namespace App\Models\Tenant;

use App\Filters\CalendarFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Calendar extends Model
{
    use HasFactory, SoftDeletes;

    // protected string $default_filters = CalendarFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'status'];

    public function companies()
    {
        return $this->hasMany(Company::class, 'calendar_id', 'id');
    }

    public function getFormattedStatusAttribute()
    {
        return $this->status === 1 ? 'active' : 'inactive';
    }

    // public function price() : Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => $value  * 100,
    //         get: fn ($value) => $value / 100,
    //     );
    // }


}
