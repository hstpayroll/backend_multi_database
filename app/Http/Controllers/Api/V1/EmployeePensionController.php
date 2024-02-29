<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\EmployeePension;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreEmployeePensionRequest;
use App\Http\Requests\UpdateEmployeePensionRequest;
use App\Http\Resources\Finance\EmployeePensionResource;

class EmployeePensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeePension = EmployeePension::paginate(10);
        return   EmployeePensionResource::collection($employeePension);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeePensionRequest  $request)
    {
        $employeePension = EmployeePension::create($request->validated());
        return new EmployeePensionResource($employeePension);
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeePension $employeePension)
    {
        return new EmployeePensionResource($employeePension);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeePensionRequest $request, EmployeePension $employeePension)
    {
        $employeePension->update($request->validated());
        return new EmployeePensionResource($employeePension);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeePension $employeePension)
    {
        $employeePension->delete();
        return response()->noContent();
    }
}
