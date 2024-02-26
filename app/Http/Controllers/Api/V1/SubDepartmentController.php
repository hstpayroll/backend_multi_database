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
        return SubDepartmentResource::collection(SubDepartment::paginate(10));
    }

    public function store(StoreSubDepartmentRequest $request)
    {
        $validatedData = $request->validated();
        $subDepartment = SubDepartment::create($validatedData);
        return new SubDepartmentResource($subDepartment);
    }

    public function show(SubDepartment $subDepartment)
    {
        return new SubDepartmentResource($subDepartment);
    }

    public function update(UpdateSubDepartmentRequest $request, SubDepartment $subDepartment)
    {
        $validatedData = $request->validated();
        $subDepartment->update($validatedData);
        return new SubDepartmentResource($subDepartment);
    }

    public function destroy(SubDepartment $subDepartment)
    {
        $subDepartment->delete();
        return response()->noContent();
    }
}
