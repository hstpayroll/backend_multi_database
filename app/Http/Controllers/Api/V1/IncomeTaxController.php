<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\IncomeTax;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeTaxRequest;
use App\Http\Requests\UpdateIncomeTaxRequest;
use App\Http\Resources\Finance\IncomeTaxResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class IncomeTaxController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('income_tax_index')) {
                $incomeTaxes = IncomeTax::paginate(10);
                return IncomeTaxResource::collection($incomeTaxes);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreIncomeTaxRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('income_tax_store')) {
                $incomeTax = IncomeTax::create($request->validated());
                return new IncomeTaxResource($incomeTax);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, IncomeTax $incomeTax)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('income_tax_show')) {
                return new IncomeTaxResource($incomeTax);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateIncomeTaxRequest $request, IncomeTax $incomeTax)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('income_tax_update')) {
                $incomeTax->update($request->validated());
                return new IncomeTaxResource($incomeTax);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, IncomeTax $incomeTax)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('income_tax_destroy')) {
                $incomeTax->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
