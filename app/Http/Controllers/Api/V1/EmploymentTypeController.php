<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\EmploymentType;
use App\Http\Requests\StoreEmploymentTypeRequest;
use App\Http\Requests\UpdateEmploymentTypeRequest;
use App\Http\Resources\Finance\EmploymentTypeResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class EmploymentTypeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employement_type_index')) {
                $employmentTypes = EmploymentType::paginate(10);
                return  EmploymentTypeResource::collection($employmentTypes);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreEmploymentTypeRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employement_type_store')) {
                $employmentType = EmploymentType::create($request->validated());
                return new EmploymentTypeResource($employmentType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, EmploymentType $employmentType)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('employement_type_show')) {
                return new EmploymentTypeResource($employmentType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateEmploymentTypeRequest $request, EmploymentType $employmentType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employement_type_update')) {
                // Update the calendar data using the request data
                $employmentType->update($request->all());
                return new EmploymentTypeResource($employmentType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, EmploymentType $employmentType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employement_type_destroy')) {
                $employmentType->delete();
                return response()->json(['message' => 'company Pension deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}