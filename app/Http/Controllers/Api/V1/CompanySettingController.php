<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CompanySetting;
use App\Http\Requests\StoreCompanySettingRequest;
use App\Http\Requests\UpdateCompanySettingRequest;
use App\Http\Resources\Finance\CompanySettingResource;

class CompanySettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companySetting = CompanySetting::paginate(10);
        return   CompanySettingResource::collection($companySetting);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanySettingRequest $request)
    {
        $companySetting = CompanySetting::create($request->validated());
        return new CompanySettingResource($companySetting);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanySetting $companySetting)
    {
        return new CompanySettingResource($companySetting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanySettingRequest $request, CompanySetting $companySetting)
    {
        $companySetting->update($request->validated());
        return new CompanySettingResource($companySetting);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanySetting $companySetting)
    {
        $companySetting->delete();
        return response()->noContent();
    }
}
