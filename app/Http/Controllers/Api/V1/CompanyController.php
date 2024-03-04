<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Company;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\Finance\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with(['currency', 'calendar'])->paginate(10);
        // dd($companies);
        //  QueryBuilder::for(Company::with(['currency', 'calendar']))
        //     ->allowedSorts(['name', 'id'])
        //     ->paginate(10);
        //  Company::with(['currency','calendar'])->paginate(10));
        return  CompanyResource::collection($companies);
    }


    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return   new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->load(['currency', 'calendar']);
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // dd($request->validated());
        $company->update($request->validated());

        return  new CompanyResource($company);

        // return new CompanyResource($company->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Company deleted successfully',
        ]);
    }
}
