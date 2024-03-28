<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\DeductionType;
use App\Http\Requests\StoreDeductionTypeRequest;
use App\Http\Requests\UpdateDeductionTypeRequest;
use App\Http\Resources\Finance\DeductionTypeResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class DeductionTypeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('deduction_type_index')) {
                $deductionTypes = DeductionType::latest()->paginate(10);
                return DeductionTypeResource::collection($deductionTypes);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
        
    }

    public function store(StoreDeductionTypeRequest $request)
    {

        try {
            $user = $request->user();
            if ($user->hasPermissionTo('deduction_type_store')) {
                $validatedData = $request->validated();
                $employeeSpecific = request()->input('is_employee_specific');

                if ($employeeSpecific == true && (request()->input('value_type') !== null || request()->input('value_type') !== null)) {
                    return response()->json([
                        'message' => 'Deduction type cannot be created due to the filled statement in value and value type. those value must be null.',
                    ], 422);

                } else {
                    $validatedData['value_type'] = $validatedData['value_type'] ?? 0;
                    $validatedData['value'] = $validatedData['value'] ?? 0;
                    
                    $deductionType = DeductionType::create($validatedData);
                    return new DeductionTypeResource($deductionType);    
                }
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }


    public function show(Request $request, DeductionType $deductionType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('deduction_type_show')) {
                return new DeductionTypeResource($deductionType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
        return new DeductionTypeResource($deductionType);
    }

    public function update(UpdateDeductionTypeRequest $request, DeductionType $deductionType)
    {

        try {
            $user = $request->user();
            if ($user->hasPermissionTo('deduction_type_update')) {
                $validatedData = $request->validated();
                $deductionType->update($validatedData);
                return new DeductionTypeResource($deductionType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, DeductionType $deductionType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('deduction_type_destroy')) {

                if ($deductionType->deductions()->exists()) {
                    return response()->json(['error' => 'Deduction Type has related deduction. Deletion not allowed.'], 422);
                }
                else{
                    $deductionType->delete();
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
