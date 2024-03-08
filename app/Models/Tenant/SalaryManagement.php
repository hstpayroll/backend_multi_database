<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryManagement extends Model
{
    use SoftDeletes;
    protected $table = 'salary_managements';


    protected $fillable = [
        'employee_id',
        'reason', 'old_salary',
        'new_salary',
        'start_date',
        'end_date',
        'description',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
