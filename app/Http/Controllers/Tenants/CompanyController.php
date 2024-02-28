<?php

namespace App\Http\Controllers\Tenants;


use Illuminate\Http\Request;
use App\Models\Tenant\Company;
use App\Models\Tenant\Calendar;
use App\Models\Tenant\Currency;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $title = __('company_info');
        $calendars = Calendar::all();
        $currencies = Currency::all();
        $company = Company::first();

        return view('tenants.finance.company.index', compact('company', 'title'))->with('calendars', $calendars)->with('currencies', $currencies);
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
    
    // ...
    
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), Company::$rules);
    
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('updating', true)->with('id', $id);
      }
    
      $company = Company::find($id) ?? abort(404, 'Company not found');
    
      if ($request->hasFile('logo')) {
        $company->logo = $request->file('logo')->storeAs('tenant6/app/public/logos', uniqid() . '_' . $request->file('logo')->getClientOriginalName());
      }
    
      $company->fill($request->except('logo'))->save();
    
      return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }    
    

    public function destroy($id)
    {
        $company = Company::find($id)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}
