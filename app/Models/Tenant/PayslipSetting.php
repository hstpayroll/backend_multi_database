<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayslipSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['company_id', 'name', 'description', 'value'];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
