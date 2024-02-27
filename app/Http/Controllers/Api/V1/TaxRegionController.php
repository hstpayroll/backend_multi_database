<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxRegionRequest;
use App\Http\Requests\UpdateTaxRegionRequest;
use App\Http\Resources\Finance\TaxRegionResource;
use App\Models\Tenant\TaxRegion;

class TaxRegionController extends Controller
{
    public function index()
    {
        return TaxRegionResource::collection(TaxRegion::all());
    }

    public function store(StoreTaxRegionRequest $request)
    {
        $taxRegion = TaxRegion::create($request->validated());
        return new TaxRegionResource($taxRegion);
    }

    public function show(TaxRegion $taxRegion)
    {
        return new TaxRegionResource($taxRegion);
    }

    public function update(UpdateTaxRegionRequest $request, TaxRegion $taxRegion)
    {
        $validatedData = $request->validated();
        $taxRegion->update($validatedData);
        return new TaxRegionResource($taxRegion);
    }

    public function destroy(TaxRegion $taxRegion)
    {
        $taxRegion->delete();
        return response()->noContent();
    }
}
