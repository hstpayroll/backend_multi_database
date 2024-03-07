<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PayrollPeriod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'start_date', 'start_date',  'payroll_name_id', 'payroll_type_id', 'fiscal_year_id', 'employee_pension_id', 'company_pension_id',  'status',
    ];
    public function payrollName()
    {
        return $this->hasMany(PayrollName::class, 'id', 'payroll_name_id');
    }

    public function payrollType()
    {
        return $this->hasMany(PayrollType::class, 'id', 'payroll_type_id');
    }

    public function fiscalYear()
    {
        return $this->hasMany(FiscalYear::class, 'id', 'fiscal_year_id');
    }
    public function employeePension()
    {
        return $this->hasMany(EmployeePension::class, 'id', 'employee_pension_id');
    }
    public function companyPension()
    {
        return $this->hasMany(CompanyPension::class, 'id', 'company_pension_id');
    }
}
