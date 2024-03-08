<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use Illuminate\Auth\Events\Registered;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::latest()->paginate(10);
        return  TenantResource::collection($tenants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Tenant::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'domain' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'unique:' . Tenant::class,
                Rule::notIn(['www', 'localhost']),
                'regex:/^[a-zA-Z0-9\-]+$/',
            ],
        ]);

        $tenant = Tenant::create($data);
        $tenant->domains()->create([
            'domain' => $data['domain'] . '.' . config('app.domain'),
        ]);

        event(new Registered($tenant));

        return new  TenantResource($tenant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        return new TenantResource($tenant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
