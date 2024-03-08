<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Company;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\Finance\CompanyResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_index')) {
                $companies = Company::with(['currency', 'calendar'])->latest()->paginate(10);
                return CompanyResource::collection($companies);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, Company $company)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_show')) {
                return new CompanyResource($company);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_update')) {
                $company->update($request->validated());
                return response()->json(['message' => 'Company updated successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Company $company)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_destroy')) {
                $company->delete();
                //optional ( 'status' => 200 , )
                return response()->json(['message' => 'Company deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
