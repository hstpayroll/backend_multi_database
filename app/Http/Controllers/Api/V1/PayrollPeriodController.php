<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollPeriodRequest;
use App\Http\Requests\UpdatePayrollPeriodRequest;
use App\Http\Resources\Finance\PayrollPeriodResource;
use App\Models\Tenant\PayrollPeriod;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PayrollPeriodController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_period_index')) {
                return PayrollPeriodResource::collection(PayrollPeriod::paginate(10));
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StorePayrollPeriodRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_period_store')) {
                $validatedData = $request->validated();
                $payrollPeriod = PayrollPeriod::create($validatedData);
                return new PayrollPeriodResource($payrollPeriod);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, PayrollPeriod $payrollPeriod)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_period_show')) {
                return new PayrollPeriodResource($payrollPeriod);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdatePayrollPeriodRequest $request, PayrollPeriod $payrollPeriod)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_period_update')) {
                $validatedData = $request->validated();
                $payrollPeriod->update($validatedData);
                return new PayrollPeriodResource($payrollPeriod);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, PayrollPeriod $payrollPeriod)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_period_destroy')) {
                $payrollPeriod->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
