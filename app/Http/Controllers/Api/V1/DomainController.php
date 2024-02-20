<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DomainResource;
use Illuminate\Http\Request;
use Stancl\Tenancy\Database\Models\Domain;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $domain = $request->input('domain');

        if ( $domain) {
            $domain_exist = Domain::where('domain',$domain.'.localhost')->first();
        if($domain_exist){
        return response()->json([
            'status' => 'success',
            'domain' => $domain,
            'message' => 'Domain exists',
        ]);
        }else{
            return response()->json([
                'status' => 'error',
                'domain' => $domain,
                'message' => ' No Domain exists by this name',
            ]);
        }
        } else {
            return response()->json([
                'status' => 'Invalid Request',
                'message' => 'Invalid Request',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
