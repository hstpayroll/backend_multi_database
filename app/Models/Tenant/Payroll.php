<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payroll extends Model
{
    protected $table = 'payrolls';
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'payroll_period_id',
        'cost_center_id',
        'number_of_days_worked',
        'basic_salary_arrears',
        'actual_basic_salary',
    ];


    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function payrollPeriod(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'payroll_period_id', 'id');
    }
    public function costCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id', 'id');
    }
}
