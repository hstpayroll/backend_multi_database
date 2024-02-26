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
    public function index()
    {
        return PayrollTypeResource::collection(PayrollType::paginate(10));
    }

    public function store(StorePayrollTypeRequest $request)
    {
        $validatedData = $request->validated();
        $payrollType = PayrollType::create($validatedData);
        return new PayrollTypeResource($payrollType);
    }

    public function show(PayrollType $payrollType)
    {
        return new PayrollTypeResource($payrollType);
    }

    public function update(UpdatePayrollTypeRequest $request, PayrollType $payrollType)
    {
        $validatedData = $request->validated();
        $payrollType->update($validatedData);
        return new PayrollTypeResource($payrollType);
    }

    public function destroy(PayrollType $payrollType)
    {
        $payrollType->delete();
        return response()->noContent();
    }
}
