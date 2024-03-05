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
            'payroll_name' =>  PayrollNameResource::collection($this->payrollName),
            'payroll_type' => PayrollTypeResource::collection($this->payrollType),
            'fiscal_year' => FiscalYearResource::collection($this->fiscalYear),
            'employee_pension' => EmployeePensionResource::collection($this->employeePension),
            'company_pension' => CompanyPensionResource::collection($this->companyPension),
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status == 1 ? 'active' : 'inactive',

        ];
    }
}
