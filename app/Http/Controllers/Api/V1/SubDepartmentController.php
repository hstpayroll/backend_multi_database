<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\SubDepartment;
use App\Http\Requests\StoreSubDepartmentRequest;
use App\Http\Requests\UpdateSubDepartmentRequest;
use App\Http\Resources\Finance\SubDepartmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubDepartmentController extends Controller
{
    public function index()
    {
        $subDepartments = SubDepartment::paginate(10);
        return SubDepartmentResource::collection($subDepartments);
    }

    public function store(StoreSubDepartmentRequest $request)
    {
        $validatedData = $request->validated();
        $subDepartment = SubDepartment::create($validatedData);
        return response()->json([
            'data' => new SubDepartmentResource($subDepartment)
        ], Response::HTTP_CREATED);
    }

    public function show(SubDepartment $subDepartment)
    {
        return response()->json([
            'data' => new SubDepartmentResource($subDepartment)
        ], Response::HTTP_OK);
    }

    public function update(UpdateSubDepartmentRequest $request, SubDepartment $subDepartment)
    {
        $validatedData = $request->validated();
        $subDepartment->update($validatedData);
        return response()->json([
            'data' => new SubDepartmentResource($subDepartment)
        ], Response::HTTP_OK);
    }

    public function destroy(SubDepartment $subDepartment)
    {
        $subDepartment->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
