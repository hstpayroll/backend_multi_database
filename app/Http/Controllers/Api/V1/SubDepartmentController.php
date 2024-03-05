<?php
use App\Models\Tenant\SubDepartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubDepartmentRequest;
use App\Http\Requests\UpdateSubDepartmentRequest;
use App\Http\Resources\Finance\SubDepartmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class SubDepartmentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('sub_department_index')) {
                return SubDepartmentResource::collection(SubDepartment::paginate(10));
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreSubDepartmentRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('sub_department_store')) {
                $subDepartment = SubDepartment::create($request->validated());
                return new SubDepartmentResource($subDepartment);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, SubDepartment $subDepartment)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('sub_department_show')) {
                return new SubDepartmentResource($subDepartment);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateSubDepartmentRequest $request, SubDepartment $subDepartment)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('sub_department_update')) {
                $subDepartment->update($request->validated());
                return new SubDepartmentResource($subDepartment);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, SubDepartment $subDepartment)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('sub_department_destroy')) {
                $subDepartment->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
