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
use Spatie\Permission\Exceptions\PermissionDoesNotExist;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return BankCollection
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('bank_index')) {
                $banks = Bank::paginate(10);
                return  BankResource::collection($banks);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreBankRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('bank_store')) {
                $validatedData = $request->validated();
                $bank = Bank::create($validatedData);
                return new BankResource($bank);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function show(Request $request, Bank $bank)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('bank_show')) {
                return new BankResource($bank);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
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
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('bank_update')) {
                $bank->update($request->validated());
                return new BankResource($bank);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bank $bank
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request, Bank $bank)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('bank_update')) {
                $bank->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Bank deleted successfully',
                ]);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
