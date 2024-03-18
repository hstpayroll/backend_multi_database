<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Tenant\SalaryManagement;
use App\Http\Requests\StoreSalaryManagementRequest;
use App\Http\Requests\UpdateSalaryManagementRequest;
use App\Http\Resources\Finance\SalaryManagementResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class SalaryManagementController extends Controller
{

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('salary_management_index')) {
                $salaryManagements = SalaryManagement::latest()->paginate(10);
                return SalaryManagementResource::collection($salaryManagements);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreSalaryManagementRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('salary_management_store')) {
                $validatedData = $request->validated();
                $salaryManagement = SalaryManagement::create($validatedData);
                return new SalaryManagementResource($salaryManagement);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function show(Request $request, SalaryManagement $id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('salary_management_show')) {
                $salaryManagement = SalaryManagement::findOrFail($id);
                return new SalaryManagementResource($salaryManagement);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateSalaryManagementRequest $request, SalaryManagement $id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('salary_management_update')) {
                $validatedData = $request->validated();
                $salaryManagement = SalaryManagement::findOrFail($id);
                $salaryManagement->update($validatedData);
                return new SalaryManagementResource($salaryManagement);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, SalaryManagement $id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('salary_management_destroy')) {
                $salaryManagement = SalaryManagement::findOrFail($id);
                $salaryManagement->delete();
                return response()->json(null, Response::HTTP_NO_CONTENT);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
