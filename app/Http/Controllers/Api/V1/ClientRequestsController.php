<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\ClientRequests;
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
        $clientRequests = ClientRequests::latest()->paginate(10);
        return ClientRequestResource::collection($clientRequests);
    }
    public function store(StoreClientRequest $request)
    {
        $validatedData = $request->validated();
        $clientRequest = ClientRequests::create($validatedData);
        return new ClientRequestResource($clientRequest);
    }
    public function show(ClientRequests $clientRequest)
    {
        return new ClientRequestResource($clientRequest);
    }

    public function update(Request $request, ClientRequests $user)
    {
        //
    }
    public function destroy(ClientRequests $clientRequest)
    {
        $clientRequest->delete();
        return response()->json(['message' => 'Client Request deleted successfully']);
    }
}
