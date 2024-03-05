<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\FiscalYear;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFiscalYearRequest;
use App\Http\Requests\UpdateFiscalYearRequest;
use App\Http\Resources\Finance\FiscalYearResource;

class FiscalYearController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::paginate();
        return  FiscalYearResource::collection($fiscalYears);
    }

    public function store(StoreFiscalYearRequest $request)
    {
        $validatedData = $request->validated();
        $fiscalYear = FiscalYear::create($validatedData);
        return new FiscalYearResource($fiscalYear);
    }

    public function show(FiscalYear $fiscalYear)
    {
        return new FiscalYearResource($fiscalYear);
    }

    public function update(UpdateFiscalYearRequest $request, FiscalYear $fiscalYear)
    {
        $fiscalYear->update($request->validated());
        return new FiscalYearResource($fiscalYear);
    }

    public function destroy(FiscalYear $fiscalYear)
    {
        $fiscalYear->delete();
        return response()->noContent();
    }
}
