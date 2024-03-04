<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Citizenship;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitizenshipRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UpdateCitizenshipRequest;
use App\Http\Resources\Finance\CitizenshipResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CitizenshipController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_index')) {
                $citizenships = Citizenship::paginate(10);
                return  CitizenshipResource::collection($citizenships);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    // public function store(StoreCitizenshipRequest $request)
    // {
    //     $citizenship = Citizenship::create($request->validated());
    //     return new CitizenshipResource($citizenship);
    // }

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
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, Citizenship $citizenship)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('citizenship_show')) {
                return new CitizenshipResource($citizenship);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(Request $request, Citizenship $citizenship)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_update')) {
                $citizenship->update($request->all());
                return new CitizenshipResource($citizenship);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Citizenship $citizenship)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('citizenship_destroy')) {
                $citizenship->delete();
                return response()->json(['message' => 'citizenship deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
