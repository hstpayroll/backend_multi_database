<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CompanySetting;
use App\Http\Requests\StoreCompanySettingRequest;
use App\Http\Requests\UpdateCompanySettingRequest;
use App\Http\Resources\Finance\CompanySettingResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CompanySettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company-setting_index')) {
                $companySettings = CompanySetting::paginate(10);
                return CompanySettingResource::collection($companySettings);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCompanySettingRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company-setting_store')) {
                $companySetting = CompanySetting::create($request->validated());
                return new CompanySettingResource($companySetting);
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
    public function show(Request $request, CompanySetting $companySetting)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('company-setting_show')) {
                return new CompanySettingResource($companySetting);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanySettingRequest $request, CompanySetting $companySetting)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company-setting_update')) {
                // Update the company setting data using the request data
                $companySetting->update($request->all());
                return new CompanySettingResource($companySetting);
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
    public function destroy(Request $request, CompanySetting $companySetting)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('company-setting_destroy')) {
                $companySetting->delete();
                return response()->json(['message' => 'Company setting deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}