<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 *
 * @property $id
 * @property $emp_id
 * @property $first_name
 * @property $father_name
 * @property $gfather_name
 * @property $sex
 * @property $birth_date
 * @property $hired_date
 * @property $tin_no
 * @property $cost_center
 * @property $tax_region_id
 * @property $grade_id
 * @property $department_id
 * @property $sub_department_id
 * @property $position_id
 * @property $employment_type_id
 * @property $citizenship_id
 * @property $company_id
 * @property $email
 * @property $bank_id
 * @property $account_number
 * @property $image
 * @property $status
 * @property $comment
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property AllowanceTransaction[] $allowanceTransactions
 * @property Bank $bank
 * @property Citizenship $citizenship
 * @property Department $department
 * @property EmploymentType $employmentType
 * @property Grade $grade
 * @property Loan[] $loans
 * @property LoanPaymentRecord[] $loanPaymentRecords
 * @property OverTimeCalculation[] $overTimeCalculations
 * @property Payroll[] $payrolls
 * @property Position $position
 * @property SalaryManagement[] $salaryManagements
 * @property SubDepartment $subDepartment
 * @property TaxRegion $taxRegion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    use SoftDeletes;




    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['emp_id', 'first_name', 'father_name', 'gfather_name', 'sex', 'birth_date', 'hired_date', 'tin_no', 'cost_center', 'tax_region_id', 'grade_id', 'department_id', 'sub_department_id', 'position_id', 'employment_type_id', 'citizenship_id', 'email', 'bank_id', 'account_number', 'image', 'status', 'comment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allowanceTransactions()
    {
        return $this->hasMany(AllowanceTransaction::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function citizenship()
    {
        return $this->hasOne(Citizenship::class, 'id', 'citizenship_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employmentType()
    {
        return $this->hasOne(EmploymentType::class, 'id', 'employment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loans()
    {
        return $this->hasMany(Loan::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loanPaymentRecords()
    {
        return $this->hasMany(LoanPaymentRecord::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function overTimeCalculations()
    {
        return $this->hasMany(OverTimeCalculation::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salaryManagements()
    {
        return $this->hasMany(SalaryManagement::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subDepartment()
    {
        return $this->hasOne(SubDepartment::class, 'id', 'sub_department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxRegion()
    {
        return $this->hasOne(TaxRegion::class, 'id', 'tax_region_id');
    }
}
