<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SalaryManagement
 *
 * @property $id
 * @property $employee_id
 * @property $reason
 * @property $old_salary
 * @property $new_salary
 * @property $start_date
 * @property $end_date
 * @property $description
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SalaryManagement extends Model
{
    use SoftDeletes;
    protected $table = 'salary_managements';

    static $rules = [
        'employee_id' => 'required',
        'reason' => 'required',
        'old_salary' => 'required',
        'new_salary' => 'required',
        'start_date' => 'required',
    ];

    protected $fillable = ['employee_id', 'reason', 'old_salary', 'new_salary', 'start_date', 'end_date', 'description', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
