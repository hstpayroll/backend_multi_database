<?php

namespace App\Models\Tenant;



use App\Models\Tenant\Calendar;
use App\Models\Tenant\Currency;
use App\Models\Tenant\LoanType;
use App\Models\Tenant\Department;
use App\Models\Tenant\AllowanceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Company extends Model
{
    use SoftDeletes, HasFactory;

    static $rules = [
        'name' => 'required',
        'currency_id' => 'required',
        'calendar_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'tin',
        'logo',
        'website',
        'email',
        'phone_number',
        'address_line',
        'city',
        'sub_city',
        'kebele',
        'woreda',
        'house_no',
        'fax',
        'currency_id',
        'calendar_id',
        'description'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allowanceTypes()
    {
        return $this->hasMany(AllowanceType::class, 'company_id', 'id');
    }


    public function calendar()
    {
        return $this->hasMany(Calendar::class, 'id', 'calendar_id');
    }

    public function currency()
    {
        return $this->hasMany(Currency::class, 'id', 'currency_id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'company_id', 'id');
    }



    public function loanTypes()
    {
        return $this->hasMany(LoanType::class, 'company_id', 'id');
    }

    public function overTimeCalculations()
    {
        return $this->hasMany(OverTimeCalculation::class, 'company_id', 'id');
    }

    public function overTimeTypes()
    {
        return $this->hasMany(OverTimeType::class, 'company_id', 'id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'company_id', 'id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class, 'company_id', 'id');
    }

    public function subDepartments()
    {
        return $this->hasMany(SubDepartment::class, 'company_id', 'id');
    }
    public function companySetting()
    {
        return $this->belongsTo(companySetting::class, 'company_id', 'id');
    }
}
