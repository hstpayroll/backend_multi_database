<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\IncomeTax;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeTaxRequest;
use App\Http\Resources\Finance\IncomeTaxResource;


class IncomeTaxController extends Controller
{
    /**
     * Display a paginated list of income taxes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $incomeTaxes = IncomeTax::paginate(10);
        return IncomeTaxResource::collection($incomeTaxes);
    }

    /**
     * Store a newly created income tax in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeTaxRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreIncomeTaxRequest $request)
    {
        $incomeTax = IncomeTax::create($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Income tax created successfully',
            'data' => new IncomeTaxResource($incomeTax)
        ], 201);
    }

    /**
     * Display the specified income tax.
     *
     * @param  \App\Models\IncomeTax  $incomeTax
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(IncomeTax $incomeTax)
    {
        return new IncomeTaxResource($incomeTax);
    }

    /**
     * Update the specified income tax in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeTaxRequest  $request
     * @param  \App\Models\IncomeTax  $incomeTax
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreIncomeTaxRequest $request, IncomeTax $incomeTax)
    {
        $incomeTax->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Income tax updated successfully',
            'data' => new IncomeTaxResource($incomeTax)
        ]);
    }

    /**
     * Remove the specified income tax from storage.
     *
     * @param  \App\Models\IncomeTax  $incomeTax
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(IncomeTax $incomeTax)
    {
        $incomeTax->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Income tax deleted successfully'
        ]);
    }
}
