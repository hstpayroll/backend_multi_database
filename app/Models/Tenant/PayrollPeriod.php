<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PayrollPeriod
 *
 * @property $id
 * @property $income_tax_id
 * @property $name
 * @property $year
 * @property $start_date
 * @property $end_date
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PayrollPeriod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'payroll_name_id',
        'payroll_type_id',
        'fiscal_year_id',
        'employee_pension_id',
        'company_pension_id',
        'name',
        'year',
        'start_date',
        'end_date',
        'status',
    ];

    public function payrollName()
    {
        return $this->belongsTo(PayrollName::class, 'payroll_name_id');
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
