<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeePension extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'rate',
        'start_date',
        'end_date',
        'status'
    ];
    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class);
    }
}
