<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Models\Tenant\Deduction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeductionRequest;
use App\Http\Requests\UpdateDeductionRequest;
use App\Http\Resources\Finance\DeductionResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class DeductionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('deduction_type_index')) {
                $deductions = Deduction::all();
                return DeductionResource::collection($deductions);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
        $deductions = Deduction::all();
        return DeductionResource::collection($deductions);
    }

    public function store(StoreDeductionRequest $request)
    {
        $validatedData = $request->validated();
        $deduction = Deduction::create($validatedData);
        return new DeductionResource($deduction);
    }

    public function show(Deduction $deduction)
    {
        return new DeductionResource($deduction);
    }

    public function update(UpdateDeductionRequest $request, Deduction $deduction)
    {
        $deduction->update($request->validated());
        return new DeductionResource($deduction);
    }

    public function destroy(Deduction $deduction)
    {
        $deduction->delete();
        return response()->noContent();
    }
}
