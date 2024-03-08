<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\GradeUpdateRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Http\Resources\Finance\GradeResource;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('grade_index')) {
                $grades = Grade::latest()->paginate(10);
                return  GradeResource::collection($grades);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreGradeRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('grade_store')) {
                $grade = Grade::create($request->validated());
                return new GradeResource($grade);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    
    public function show(Request $request, Grade $grade)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('grade_show')) {
                return new GradeResource($grade);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('grade_update')) {
                // Update the calendar data using the request data
                $grade->update($request->all());
                return new GradeResource($grade);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Grade $grade)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('grade_destroy')) {
                $grade->delete();
                return response()->json(['message' => 'company Pension deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
