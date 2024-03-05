<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiscalYear  extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
        'status'
    ];
    public function payrollPeriods()
    {
        return $this->hasMany(PayrollPeriod::class);
    }
}
