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
    public function index()
    {
        $domains = Domain::with('tenant')->latest()->paginate(10);       // dd($domains->tenant);
        return DomainResource::collection($domains);
    }

    public function store(Request $request, Domain $domain)
    {
        $data = $request->validate([
            'allowance_type_id' => 'required|exists:allowance_types,id',
            'number_of_days' => 'required|integer',
            'value_in_birr' => 'required|numeric',
        ]);

        return response()->json([
            'message' => 'Allowance type assigned successfully.',
        ]);
    }

    public function domain_exist(Request $request)
    {
        $domain = $request->input('domain');
        // dd($domain);
        if ($domain) {
            $domain_exist = Domain::where('domain', $domain . '.localhost')->first();
            // dd($domain_exist);
            if ($domain_exist) {
                return response()->json([
                    'status' => 'success',
                    'domain' => $domain,
                    'message' => 'Domain exists',
                ]);
            } else {
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
    public function auth_user()
    {
        $auth_user = auth()->user();
        return response()->json([
            'message' => 'success',
            'code' => '200',
        ]);
    }
}
