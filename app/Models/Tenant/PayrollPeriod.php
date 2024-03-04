<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PayrollPeriod extends Model
{
    use SoftDeletes;

    public function payrollName()
    {
        return $this->belongsTo(PayrollName::class);
    }

    public function payrollType()
    {
        return $this->belongsTo(PayrollType::class, 'payroll_type_id');
    }

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class, 'fiscal_year_id');
    }
    public function employeePension()
    {
        return $this->belongsTo(FiscalYear::class, 'employee_pension_id');
    }
    public function companyPension()
    {
        return $this->belongsTo(FiscalYear::class, 'company_pension_id');
    }
}
