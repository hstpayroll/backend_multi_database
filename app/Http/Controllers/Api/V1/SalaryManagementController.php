<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalaryManagementRequest;
use App\Http\Requests\UpdateSalaryManagementRequest;
use App\Http\Resources\Finance\SalaryManagementResource;
use App\Models\Tenant\SalaryManagement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalaryManagementController extends Controller
{
    public function index()
    {
        $salaryManagements = SalaryManagement::latest()->paginate(10);
        return SalaryManagementResource::collection($salaryManagements);
    }

    public function store(StoreSalaryManagementRequest $request)
    {
        $validatedData = $request->validated();
        $salaryManagement = SalaryManagement::create($validatedData);
        return new SalaryManagementResource($salaryManagement);
    }

    public function show($id)
    {
        $salaryManagement = SalaryManagement::findOrFail($id);
        return new SalaryManagementResource($salaryManagement);
    }

    public function update(UpdateSalaryManagementRequest $request, $id)
    {
        $validatedData = $request->validated();
        $salaryManagement = SalaryManagement::findOrFail($id);
        $salaryManagement->update($validatedData);
        return new SalaryManagementResource($salaryManagement);
    }

    public function destroy($id)
    {
        $salaryManagement = SalaryManagement::findOrFail($id);
        $salaryManagement->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
