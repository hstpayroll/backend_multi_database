<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'emp_id' => $this->emp_id,
            'first_name' => $this->first_name,
            'father_name' => $this->father_name,
            'gfather_name' => $this->gfather_name,
            'sex' => $this->sex,
            'birth_date' => $this->birth_date,
            'hired_date' => $this->hired_date,
            'tin_no' => $this->tin_no,
            'cost_center' => $this->cost_center,
            'tax_region' => new TaxRegionResource($this->taxRegion),
            'grade' => new GradeResource($this->grade),
            'department' => new DepartmentResource($this->department),
            'sub_department' => new SubDepartmentResource($this->subDepartment),
            'position' => new PositionResource($this->position),
            'employment_type' => new EmploymentTypeResource($this->employmentType),
            'citizenship' => new CitizenshipResource($this->citizenship),
            'email' => $this->email,
            'bank' => new BankResource($this->bank),
            'account_number' => $this->account_number,
            'image' => $this->image,
            'status' => $this->status == 1 ? 'active' : 'inactive',
            'comment' => $this->comment,
            // Include other relationships or computed properties as needed
        ];
    }
}
