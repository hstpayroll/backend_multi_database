<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\Finance\DepartmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(10);
        return DepartmentResource::collection($departments);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $validatedData = $request->validated();
        $department = Department::create($validatedData);
        return new DepartmentResource($department);
    }

    public function show(Department $department)
    {
        return new DepartmentResource($department);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validatedData = $request->validated();
        $department->update($validatedData);
        return new DepartmentResource($department);
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return Response::noContent();
    }
}
