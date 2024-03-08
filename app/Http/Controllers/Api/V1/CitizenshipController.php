<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Citizenship;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitizenshipRequest;
use App\Http\Requests\UpdateCitizenshipRequest;
use App\Http\Resources\Finance\CitizenshipResource;


class CitizenshipController extends Controller
{
    public function index(Request $request)
    {
        return CitizenshipResource::collection(Citizenship::latest()->paginate(20));
    }

    public function store(StoreCitizenshipRequest $request)
    {
        $citizenship = Citizenship::create($request->validated());
        return new CitizenshipResource($citizenship);
    }

    public function show(Citizenship $citizenship)
    {
        return new CitizenshipResource($citizenship);
    }

    public function update(UpdateCitizenshipRequest $request, Citizenship $citizenship)
    {
        $citizenship->update($request->validated());
        return new CitizenshipResource($citizenship);
    }

    public function destroy(Citizenship $citizenship)
    {
        $citizenship->delete();
        return response()->noContent();
    }
}
