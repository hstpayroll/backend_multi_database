<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{


    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tax_region' => new TaxRegionResource($this->taxRegion),
            'grade' => new GradeResource($this->grade),
            'department' => new DepartmentResource($this->department),
            'sub_department' => new SubDepartmentResource($this->subDepartment),
            'position' => new PositionResource($this->position),
            'employment_type' => new EmploymentTypeResource($this->employmentType),
            'citizenship' => new CitizenshipResource($this->citizenship),
            'bank' => new BankResource($this->bank),
            'emp_id' => $this->emp_id,
            'first_name' => $this->first_name,
            'father_name' => $this->father_name,
            'gfather_name' => $this->gfather_name,
            'sex' => $this->sex == 1 ? 'male' : 'female',
            'birth_date' => $this->birth_date,
            'hired_date' => $this->hired_date,
            'tin_no' => $this->tin_no,
            'phone_number' => $this->phone_number,
            'city' => $this->city,
            'sub_city' => $this->sub_city,
            'kebele' => $this->kebele,
            'woreda' => $this->woreda,
            'house_no' => $this->house_no,
            'email' => $this->email,
            'cost_center' => $this->cost_center,
            'account_number' => $this->account_number,
            'image' => $this->image,
            'status' => $this->status == 1 ? 'active' : 'inactive',
            'comment' => $this->comment,
        ];
    }
}
