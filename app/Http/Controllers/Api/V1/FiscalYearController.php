<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\FiscalYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFiscalYearRequest;
use App\Http\Requests\UpdateFiscalYearRequest;
use App\Http\Resources\Finance\FiscalYearResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class FiscalYearController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('fiscal_year_index')) {
                $fiscalYears = FiscalYear::latest()->paginate(10);
                return  FiscalYearResource::collection($fiscalYears);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreFiscalYearRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('fiscal_year_store')) {
                $fiscalYear = FiscalYear::create($request->validated());
                return new FiscalYearResource($fiscalYear);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, FiscalYear $fiscalYear)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('fiscal_year_show')) {
                return new FiscalYearResource($fiscalYear);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateFiscalYearRequest $request, FiscalYear $fiscalYear)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('fiscal_year_update')) {
                // Update the calendar data using the request data
                $fiscalYear->update($request->all());
                return new FiscalYearResource($fiscalYear);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, FiscalYear $fiscalYear)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_pension_destroy')) {
                $fiscalYear->delete();
                return response()->json(['message' => 'company Pension deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
