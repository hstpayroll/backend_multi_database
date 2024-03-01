<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant\CompanyPension;

/**
 * Class CompanyPensionController
 * @package App\Http\Controllers
 */
class CompanyPensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyPensions = CompanyPension::paginate();

        return view('company-pension.index', compact('companyPensions'))
            ->with('i', (request()->input('page', 1) - 1) * $companyPensions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyPension = new CompanyPension();
        return view('company-pension.create', compact('companyPension'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(CompanyPension::$rules);

        // $companyPension = CompanyPension::create($request->all());

        // return redirect()->route('company-pensions.index')
        //     ->with('success', 'CompanyPension created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyPension = CompanyPension::find($id);

        return view('company-pension.show', compact('companyPension'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyPension = CompanyPension::find($id);

        return view('company-pension.edit', compact('companyPension'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CompanyPension $companyPension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyPension $companyPension)
    {
        // request()->validate(CompanyPension::$rules);

        $companyPension->update($request->all());

        return redirect()->route('company-pensions.index')
            ->with('success', 'CompanyPension updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $companyPension = CompanyPension::find($id)->delete();

        return redirect()->route('company-pensions.index')
            ->with('success', 'CompanyPension deleted successfully');
    }
}
