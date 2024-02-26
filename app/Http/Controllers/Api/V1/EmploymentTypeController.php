<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\EmploymentType;
use App\Http\Requests\StoreEmploymentTypeRequest;
use App\Http\Resources\Finance\EmploymentTypeResource;

class EmploymentTypeController extends Controller
{
    public function index()
    {
        $employmentTypes = EmploymentType::paginate(10);
        return EmploymentTypeResource::collection($employmentTypes);
    }

    public function store(StoreEmploymentTypeRequest $request)
    {
        $employmentType = EmploymentType::create($request->validated());
        return new EmploymentTypeResource($employmentType);
    }

    public function show(EmploymentType $employmentType)
    {
        return new EmploymentTypeResource($employmentType);
    }

    public function update(StoreEmploymentTypeRequest $request, EmploymentType $employmentType)
    {
        $employmentType->update($request->validated());
        return new EmploymentTypeResource($employmentType);
    }

    public function destroy(EmploymentType $employmentType)
    {
        $employmentType->delete();
        return response()->noContent();
    }
}
