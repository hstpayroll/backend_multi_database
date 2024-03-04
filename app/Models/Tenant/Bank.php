<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Employee;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'swift'];

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
