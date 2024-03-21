<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\Loan;
use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use PhpParser\Node\Expr\Empty_;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\Finance\LoanResource;
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

    public function LoansByEmployee(Request $request, Employee $employee)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loans_by_employee')) {
                $loans = $employee->loans()->get();
                return  LoanResource::collection($loans); // Corrected line
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
    public function LoansByEmployee2(Request $request, Employee $employee)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loans_by_employee')) {
                $loans = $employee->loans()->get();

                $loansWithPayments = Loan::where('loans.employee_id', $employee->id)
                    ->leftJoin('loan_payment_records', 'loans.id', '=', 'loan_payment_records.loan_id')
                    ->select(
                        'loans.id',
                        'loans.employee_id',
                        'loans.name',
                        'loans.amount',
                        'loans.monthly_installment',
                        DB::raw('SUM(loan_payment_records.amount_payed) as total_paid'),
                        DB::raw('loans.amount - COALESCE(SUM(loan_payment_records.amount_payed), 0) as remaining_amount')
                    )
                    ->whereNull('loans.deleted_at')
                    ->where('loans.status', 1)
                    ->groupBy('loans.id', 'loans.employee_id', 'loans.name', 'loans.amount', 'loans.monthly_installment')
                    ->get();
                return response()->json([
                    'loans' => $loansWithPayments, // Include loan details
                ]);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
