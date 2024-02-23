<?php

namespace App\Http\Controllers\Landlord;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->paginate(5);
        return view('landlord.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('landlord.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Tenant::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'domain' => [
    //             'required',
    //             'string',
    //             'min:3',
    //             'max:20',
    //             'unique:' . Tenant::class,
    //             Rule::notIn(['www', 'localhost']),
    //             'regex:/^[a-zA-Z0-9\-]+$/',
    //         ],
    //     ]);

    //     $tenant = Tenant::create($data);
    //     $tenant->domains()->create([
    //         'domain' => $data['domain'] . '.' . config('app.domain'),
    //     ]);
    //     event(new Registered($tenant));

    //     // Auth::login($user);

    //     return redirect()->to(route('tenants.index'));
    // }

    public function store(Request $request)
    {
        // try {
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

            // Flash success message
            Session::flash('success', 'Tenant created successfully');

            return redirect()->route('tenants.index')
            ->with('success', 'Currency created successfully.');
        // } catch (\Exception $e) {
        //     // Flash error message
        //     Session::flash('error', 'Error creating tenant: ' . $e->getMessage());

        //     return redirect()->back()->withInput();
        // }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Tenant::class],
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

        // Update the main tenant data
        $tenant->update($data);

        // Update the associated domain
        $tenant->domains()->update([
            'domain' => $data['domain'] . '.' . config('app.domain'),
        ]);

        //event(new Registered($tenant));
        
        return redirect()->route('tenants.index')
        ->with('success', 'Tenant Update successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        
        // dd($tenant->domains()->id);
        $tenant = $tenant->delete();
        return redirect()->route('tenants.index')
            ->with('success', 'Bank deleted successfully');
    }
}
