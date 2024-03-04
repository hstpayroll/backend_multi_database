<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Tenant\Bank;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankCollection;
use App\Http\Requests\StoreBankRequest;
use App\Http\Resources\Finance\BankResource;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BankCollection
     */
    public function index()
    {
        $banks = Bank::paginate(10);
        return  BankResource::collection($banks);
    }

    public function store(StoreBankRequest $request)
    {
        $bank = Bank::create($request->validated());
        return new BankResource($bank);
    }

    public function show(Bank $bank)
    {
        return new BankResource($bank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bank $bank
     * @return BankResource
     */
    public function update(StoreBankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());
        return new BankResource($bank);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bank $bank
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Bank deleted successfully',
        ]);
    }
}
