<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CompanyPension;
use App\Http\Requests\StoreCompanyPensionRequest;
use App\Http\Requests\UpdateCompanyPensionRequest;
use App\Http\Resources\Finance\CompanyPensionResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CompanyPensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_pension_index')) {
                $companyPension = CompanyPension::latest()->paginate(10);
                return  CompanyPensionResource::collection($companyPension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCompanyPensionRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_pension_store')) {
                $companyPension = CompanyPension::create($request->validated());
                return new CompanyPensionResource($companyPension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, CompanyPension $companyPension)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('company_pension_show')) {
                return new CompanyPensionResource($companyPension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyPensionRequest $request, CompanyPension $companyPension)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_pension_update')) {
                // Update the calendar data using the request data
                $companyPension->update($request->all());
                return new CompanyPensionResource($companyPension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CompanyPension $companyPension)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company_pension_destroy')) {
                $companyPension->delete();
                return response()->json(['message' => 'company Pension deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
