<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request, Company $company)
    {
        $employees_count = Employee::where('company_id',  $company->id)->count();
        return view('company.dashboard')
            ->with('company', $company)
            ->with('employees_count', $employees_count);
    }
    public function index()
    {

        $companies = Company::paginate(10);

        return view('company.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * $companies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('company.create', compact('company'));
    }

    public function store(Request $request)
    {
        request()->validate(Company::$rules);

        $company = Company::create($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', compact('company'));
    }


    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        request()->validate(Company::$rules);

        $company->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    public function destroy($id)
    {
        $company = Company::find($id)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
