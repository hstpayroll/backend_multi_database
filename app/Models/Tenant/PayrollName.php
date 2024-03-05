<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PayrollName extends Model
{

    protected $fillable = ['name', 'start_date', 'end_date', 'details', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomeTaxes()
    {
        return $this->hasMany(IncomeTax::class, 'payroll_name_id', 'id');
    }
    public function payrollPeriods()
    {
        return $this->belongsTo(PayrollPeriod::class, 'payroll_period_id', 'id');
    }
}
