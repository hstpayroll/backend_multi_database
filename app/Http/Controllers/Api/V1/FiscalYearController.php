<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\FiscalYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finance\FiscalYearResource;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $FiscalYear = FiscalYear::paginate(10);
        return  FiscalYearResource::collection($FiscalYear);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = FiscalYear::create($request->validated());
        return response()->json([
            'company' =>  new FiscalYearResource($company),
            'status' => 200,
            'message' => 'Company created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(FiscalYear $FiscalYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FiscalYear $FiscalYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FiscalYear $FiscalYear)
    {
        //
    }
}
