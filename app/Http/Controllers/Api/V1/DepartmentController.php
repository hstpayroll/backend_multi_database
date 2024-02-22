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
        return response()->json([
            'data' => DepartmentResource::collection($departments)
        ], Response::HTTP_OK);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $validatedData = $request->validated();
        $department = Department::create($validatedData);
        return response()->json([
            'data' => new DepartmentResource($department)
        ], Response::HTTP_CREATED);
    }

    public function show(Department $department)
    {
        return response()->json([
            'data' => new DepartmentResource($department)
        ], Response::HTTP_OK);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validatedData = $request->validated();
        $department->update($validatedData);
        return response()->json([
            'data' => new DepartmentResource($department)
        ], Response::HTTP_OK);
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
