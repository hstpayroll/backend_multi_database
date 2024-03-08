<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollTypeRequest;
use App\Http\Requests\UpdatePayrollTypeRequest;
use App\Http\Resources\Finance\PayrollTypeResource;
use App\Models\Tenant\PayrollType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PayrollTypeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_type_index')) {
                return PayrollTypeResource::collection(PayrollType::latest()->paginate(10));
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StorePayrollTypeRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_type_store')) {
                $payrollType = PayrollType::create($request->validated());
                return new PayrollTypeResource($payrollType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, PayrollType $payrollType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_type_show')) {
                return new PayrollTypeResource($payrollType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdatePayrollTypeRequest $request, PayrollType $payrollType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_type_update')) {
                $payrollType->update($request->validated());
                return new PayrollTypeResource($payrollType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, PayrollType $payrollType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payroll_type_destroy')) {
                $payrollType->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
