<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PayrollPeriod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'payroll_name_id',
        'payroll_type_id',
        'fiscal_year_id',
        'employee_pension_id',
        'company_pension_id',
        'status',
    ];
    public function payrollName()
    {
        return $this->belongsTo(PayrollName::class);
    }

    public function payrollType()
    {
        return $this->belongsTo(PayrollType::class);
    }

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function employeePension()
    {
        return $this->belongsTo(EmployeePension::class);
    }
    public function companyPension()
    {
        return $this->belongsTo(CompanyPension::class);
    }
}
