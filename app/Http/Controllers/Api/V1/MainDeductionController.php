<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\MainDeduction;
use App\Http\Requests\StoreMainDeductionRequest;
use App\Http\Requests\UpdateMainDeductionRequest;
use App\Http\Resources\Finance\MainDeductionResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class MainDeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_deduction_index')) {
                return MainDeductionResource::collection(MainDeduction::latest()->paginate(10));
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
    public function store(StoreMainDeductionRequest $request)
    {
        
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_deduction_store')) {
                $validatedData = $request->validated();
                $mainDeduction = MainDeduction::create($validatedData);
                return new MainDeductionResource($mainDeduction);
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
    public function show(Request $request, MainDeduction $mainDeduction)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_deduction_show')) {
                return new MainDeductionResource($mainDeduction);
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
    public function update(UpdateMainDeductionRequest $request, MainDeduction $mainDeduction)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_deduction_update')) {
                $validatedData = $request->validated();
                $mainDeduction->update($validatedData);
                return new MainDeductionResource($mainDeduction);
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
    public function destroy(Request $request, MainDeduction $mainDeduction)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_deduction_destroy')) {

                if ($mainDeduction->deductionTypes()->exists()) {
                    return response()->json(['error' => 'Main deduction has related deduction types. Deletion not allowed.'], 422);
                }
                else{
                    $mainDeduction->delete();
                    return response()->json(['message' => 'Main deduction deleted successfully.']);
                }
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
