<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    protected $includeRelationships;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @param  bool  $includeRelationships
     * @return void
     */
    public function __construct($resource, $includeRelationships = true)
    {
        parent::__construct($resource);
        $this->includeRelationships = $includeRelationships;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $data = [
            'id' => $this->id,
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

        // Check if relationships should be included
        if ($this->includeRelationships) {
            $data['tax_region'] = new TaxRegionResource($this->taxRegion);
            $data['grade'] = new GradeResource($this->grade);
            $data['department'] = new DepartmentResource($this->department);
            $data['sub_department'] = new SubDepartmentResource($this->subDepartment);
            $data['position'] = new PositionResource($this->position);
            $data['employment_type'] = new EmploymentTypeResource($this->employmentType);
            $data['citizenship'] = new CitizenshipResource($this->citizenship);
            $data['bank'] = new BankResource($this->bank);
        }

        return $data;
    }
}
