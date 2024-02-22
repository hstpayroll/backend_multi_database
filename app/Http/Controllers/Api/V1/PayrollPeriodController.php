<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollPeriodRequest;
use App\Http\Requests\UpdatePayrollPeriodRequest;
use App\Http\Resources\Finance\PayrollPeriodResource;
use App\Models\Tenant\PayrollPeriod;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PayrollPeriodController extends Controller
{
    public function index()
    {
        $payrollPeriods = PayrollPeriod::paginate(10);
        return response()->json(['data' => PayrollPeriodResource::collection($payrollPeriods)], Response::HTTP_OK);
    }

    public function store(StorePayrollPeriodRequest $request)
    {
        $validatedData = $request->validated();
        $payrollPeriod = PayrollPeriod::create($validatedData);
        return response()->json(['data' => new PayrollPeriodResource($payrollPeriod)], Response::HTTP_CREATED);
    }

    public function show(PayrollPeriod $payrollPeriod)
    {
        return response()->json(['data' => new PayrollPeriodResource($payrollPeriod)], Response::HTTP_OK);
    }

    public function update(UpdatePayrollPeriodRequest $request, PayrollPeriod $payrollPeriod)
    {
        $validatedData = $request->validated();
        $payrollPeriod->update($validatedData);
        return response()->json(['data' => new PayrollPeriodResource($payrollPeriod)], Response::HTTP_OK);
    }

    public function destroy(PayrollPeriod $payrollPeriod)
    {
        $payrollPeriod->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
