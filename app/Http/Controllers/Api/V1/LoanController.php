<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\Finance\LoanResource;
use App\Models\Tenant\Loan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_index')) {
                $loans = Loan::latest()->paginate(10);
                return LoanResource::collection($loans);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreLoanRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_store')) {
                $loan = Loan::create($request->validated());
                return new LoanResource($loan);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, Loan $loan)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_show')) {
                return new LoanResource($loan);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_update')) {
                $loan->update($request->validated());
                return new LoanResource($loan);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Loan $loan)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_destroy')) {
                $loan->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function showLoansByEmployee(Request $request, $employee_id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loans_by_employee')) {
                $loans = Loan::where('employee_id', $employee_id)->get();
                return  LoanResource::collection($loans); // Corrected line
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
