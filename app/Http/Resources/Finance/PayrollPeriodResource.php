<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayrollPeriodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payroll_name' =>  new PayrollNameResource($this->payrollName),
            'payroll_type' => new  PayrollTypeResource($this->payrollType),
            'fiscal_year' => new FiscalYearResource($this->fiscalYear),
            'employee_pension' => new EmployeePensionResource($this->employeePension),
            'company_pension' => new CompanyPensionResource($this->companyPension),
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status == 1 ? 'active' : 'inactive',

        ];
    }
}
