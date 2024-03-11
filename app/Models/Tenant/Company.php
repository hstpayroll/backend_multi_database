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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use SoftDeletes, HasFactory;

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

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }

    //revers relationship
    public function companySetting()
    {
        return $this->hasOne(companySetting::class);
    }
    public function payslipSetting()
    {
        return $this->hasOne(PayslipSetting::class);
    }
}
