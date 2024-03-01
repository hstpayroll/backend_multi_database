<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CompanyPension;
use App\Http\Requests\StoreCompanyPensionRequest;
use App\Http\Requests\UpdateCompanyPensionRequest;
use App\Http\Resources\Finance\CompanyPensionResource;

class CompanyPensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyPension = CompanyPension::paginate(10);
        return   CompanyPensionResource::collection($companyPension);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyPensionRequest $request)
    {
        $companyPension = CompanyPension::create($request->validated());
        return new CompanyPensionResource($companyPension);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyPension $companyPension)
    {
        return new CompanyPensionResource($companyPension);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyPensionRequest $request, CompanyPension $companyPension)
    {
        $companyPension->update($request->validated());
        return new CompanyPensionResource($companyPension);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyPension $companyPension)
    {
        $companyPension->delete();
        return response()->noContent();
    }
}
