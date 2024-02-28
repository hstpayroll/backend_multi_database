<?php

namespace App\Http\Controllers\Landlord;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Spatie\Activitylog\Models\Activity;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')
            ->get();
        return view('landlord.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenant = new Tenant();
        return view('landlord.tenants.create')->with('tenant', $tenant);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

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

        // Auth::login($user);
        $activity = Activity::all()->last();
        Log::info($activity);

        return redirect()->to(route('tenants.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view('landlord.tenants.edit')->with('tenant', $tenant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            Rule::unique((new Tenant)->getTable())->ignore($tenant),
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

        $tenant->update($data);
        $tenant->domains()->update([
            'domain' => $data['domain'] . '.' . config('app.domain'),
        ]);
        event(new Registered($tenant));

        // Auth::login($user);
        $activity = Activity::all()->last();
        Log::info($activity);

        return redirect()->to(route('tenants.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        // dd($tenant);
        $tenant->domains()->delete();
        $tenant->delete();
        return redirect()->to(route('tenants.index'));
    }
}
