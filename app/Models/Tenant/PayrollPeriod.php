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
        'income_tax_id',
        'payroll_type_id',
        'fiscal_year_id',
        'name',
        'year',
        'start_date',
        'end_date',
        'status',
    ];

    public function incomeTaxes()
    {
        return $this->hasMany(IncomeTax::class, 'id', 'income_tax_id');
    }

    public function payrollTypes()
    {
        return $this->hasMany(PayrollType::class, 'id', 'payroll_type_id');
    }

    public function fiscalYears()
    {
        return $this->hasMany(FiscalYear::class, 'id', 'fiscal_year_id');
    }
}
