<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollTypeRequest;
use App\Http\Requests\UpdatePayrollTypeRequest;
use App\Http\Resources\Finance\PayrollTypeResource;
use App\Models\Tenant\PayrollType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PayrollTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $payrollTypes = PayrollType::paginate();
        return response()->json([
            'success' => true,
            'data' => PayrollTypeResource::collection($payrollTypes)
        ]);
    }

    public function store(StorePayrollTypeRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $payrollType = PayrollType::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Payroll type created successfully',
            'data' => new PayrollTypeResource($payrollType)
        ], JsonResponse::HTTP_CREATED);
    }

    public function show(PayrollType $payrollType): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new PayrollTypeResource($payrollType)
        ]);
    }

    public function update(UpdatePayrollTypeRequest $request, PayrollType $payrollType): JsonResponse
    {
        $validatedData = $request->validated();
        $payrollType->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Payroll type updated successfully',
            'data' => new PayrollTypeResource($payrollType)
        ]);
    }

    public function destroy(PayrollType $payrollType): JsonResponse
    {
        $payrollType->delete();
        return response()->json([
            'success' => true,
            'message' => 'Payroll type deleted successfully'
        ]);
    }
}
