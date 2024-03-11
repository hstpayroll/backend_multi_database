<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class IncomeTax extends Model
{
    use SoftDeletes;

    protected $table = 'income_taxes';


    protected $fillable = [
        'payroll_name_id',
        'name',
        'min_income',
        'max_income',
        'tax_rate',
        'deduction',
        'details',
        'status'
    ];


    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'income_taxe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payrollName()
    {
        return $this->hasOne(PayrollName::class, 'id', 'payroll_name_id');
    }
}
