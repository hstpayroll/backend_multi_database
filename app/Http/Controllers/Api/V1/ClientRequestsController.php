<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\client_requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\Finance\ClientRequestResource;

class ClientRequestsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientRequests = client_requests::latest()->paginate(10);
        return ClientRequestResource::collection($clientRequests);
    }
    public function store(StoreClientRequest $request)
    {
        $validatedData = $request->validated();
        $clientRequest = client_requests::create($validatedData);
        return new ClientRequestResource($clientRequest);
    }
    public function show(client_requests $clientRequest)
    {
        return new ClientRequestResource($clientRequest);
    }

    public function update(Request $request, client_requests $user)
    {
        //
    }
    public function destroy(client_requests $clientRequest)
    {
        $clientRequest->delete();
        return response()->json(['message' => 'Client Request deleted successfully']);
    }
}

