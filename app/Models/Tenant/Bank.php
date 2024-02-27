<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Employee;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name','swift'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'swift']);
    }
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }


}
