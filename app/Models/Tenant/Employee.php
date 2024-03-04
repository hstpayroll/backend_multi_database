<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }

    public function citizenship()
    {
        return $this->hasOne(Citizenship::class, 'id', 'citizenship_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function employmentType()
    {
        return $this->hasOne(EmploymentType::class, 'id', 'employment_type_id');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }


    public function loans()
    {
        return $this->hasMany(Loan::class, 'employee_id', 'id');
    }

    public function loanPaymentRecords()
    {
        return $this->hasMany(LoanPaymentRecord::class, 'employee_id', 'id');
    }

    public function overTimeCalculations()
    {
        return $this->hasMany(OverTimeCalculation::class, 'employee_id', 'id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id', 'id');
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }

    public function salaryManagements()
    {
        return $this->hasMany(SalaryManagement::class, 'employee_id', 'id');
    }

    public function subDepartment()
    {
        return $this->belongsTo(SubDepartment::class, 'sub_department_id', 'id');
    }

    public function taxRegion()
    {
        return $this->hasOne(TaxRegion::class, 'id', 'tax_region_id');
    }
}
