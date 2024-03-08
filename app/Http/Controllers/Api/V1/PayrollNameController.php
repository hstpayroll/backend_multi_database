<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\PayrollName;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollNameRequest;
use App\Http\Requests\UpdatePayrollNameRequest;
use App\Http\Resources\Finance\PayrollNameResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PayrollNameController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_name_index')) {
                $payrollNames = PayrollName::latest()->paginate(10);
                return PayrollNameResource::collection($payrollNames);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StorePayrollNameRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_name_store')) {
                $payrollName = PayrollName::create($request->validated());
                return new PayrollNameResource($payrollName);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, PayrollName $payrollName)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_name_show')) {
                return new PayrollNameResource($payrollName);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdatePayrollNameRequest $request, PayrollName $payrollName)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_name_update')) {
                $payrollName->update($request->validated());
                return new PayrollNameResource($payrollName);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, PayrollName $payrollName)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_name_destroy')) {
                $payrollName->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
