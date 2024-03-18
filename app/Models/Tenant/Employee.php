<?php

namespace App\Models\Tenant;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use SoftDeletes;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        //basic info
        'emp_id',
        'first_name',
        'father_name',
        'gfather_name',
        'sex',
        'birth_date',
        'hired_date',
        'tin_no',
        //address
        'city',
        'sub_city',
        'kebele',
        'woreda',
        'house_no',
        'email',
        'phone_number',

        'cost_center',

        'tax_region_id',
        'grade_id',
        'department_id',
        'sub_department_id',
        'position_id',
        'employment_type_id',
        'citizenship_id',
        'bank_id',
        'account_number',
        'image',
        'status',
        'comment'
    ];


    public function allowanceTransactions()
    {
        return $this->hasMany(
            AllowanceTransaction::class,
            'employee_id',
            'id'
        );
    }
    public function getFullNameAttribute(): string
    {
        $fullName = trim($this->first_name . ' ' . $this->father_name . ' ' . $this->gfather_name);
        return str_replace('  ', ' ', $fullName);
        return ucwords($fullName);
    }
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function citizenship(): BelongsTo
    {
        return $this->belongsTo(Citizenship::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function employmentType(): BelongsTo
    {
        return $this->belongsTo(EmploymentType::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }


    public function loans()
    {
        return $this->belongsTo(Loan::class, 'employee_id', 'id');
    }

    public function loanPaymentRecords()
    {
        return $this->belongsTo(LoanPaymentRecord::class, 'employee_id', 'id');
    }

    public function overTimeCalculations()
    {
        return $this->belongsTo(OverTimeCalculation::class, 'employee_id', 'id');
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id', 'id');
    }

    public function salaryManagements()
    {
        return $this->hasMany(SalaryManagement::class)
            ->where('status', '1')->first();
    }

    public function subDepartment()
    {
        return $this->belongsTo(SubDepartment::class, 'sub_department_id', 'id');
    }

    public function taxRegion()
    {
        return $this->hasOne(TaxRegion::class, 'id', 'tax_region_id');
    }
    public function getSalaryAttribute()
    {
        $activeSalary = $this->salaryManagements()->new_salary;
        return $activeSalary;
    }
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1); // Assuming 'active' is represented by status 1
    }
}
