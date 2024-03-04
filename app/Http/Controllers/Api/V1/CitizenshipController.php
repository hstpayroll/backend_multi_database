<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitizenshipRequest;
use App\Http\Requests\UpdateCitizenshipRequest;
use App\Http\Resources\Finance\CitizenshipResource;
use App\Models\Tenant\Citizenship;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Symfony\Component\HttpFoundation\Response;

class CitizenshipController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_index')) {
                return CitizenshipResource::collection(Citizenship::paginate(20));
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreCitizenshipRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_store')) {
                $citizenship = Citizenship::create($request->validated());
                return new CitizenshipResource($citizenship);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function show(Request $request, Citizenship $citizenship)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_show')) {
                return new CitizenshipResource($citizenship);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateCitizenshipRequest $request, Citizenship $citizenship)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_update')) {
                $citizenship->update($request->validated());
                return new CitizenshipResource($citizenship);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Citizenship $citizenship)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_destroy')) {
                $citizenship->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}

