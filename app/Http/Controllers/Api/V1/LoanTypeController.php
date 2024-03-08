<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanTypeRequest;
use App\Http\Requests\UpdateLoanTypeRequest;
use App\Http\Resources\Finance\LoanTypeResource;
use App\Models\Tenant\LoanType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class LoanTypeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_type_index')) {
                $loanTypes = LoanType::latest()->paginate(10);
                return LoanTypeResource::collection($loanTypes);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreLoanTypeRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_type_store')) {
                $loanType = LoanType::create($request->validated());
                return new LoanTypeResource($loanType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, LoanType $loanType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_type_show')) {
                return new LoanTypeResource($loanType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateLoanTypeRequest $request, LoanType $loanType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_type_update')) {
                $loanType->update($request->validated());
                return new LoanTypeResource($loanType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, LoanType $loanType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_type_destroy')) {
                $loanType->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
