<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\Request;
use App\Models\Tenant\SubDepartment;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Company;
use App\Models\Tenant\Department;
use Illuminate\Support\Facades\Validator;

/**
 * Class SubDepartmentController
 * @package App\Http\Controllers
 */
class SubDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('sub_department');
        $company = Company::first();
        $departments = Department::all();
        $subDepartments = SubDepartment::with('department')->paginate(5);

        return view('tenants.finance.Department-Section.sub-department.show', compact('subDepartments', 'title'))->with('company', $company)->with('departments', $departments)
            ->with('i', (request()->input('page', 1) - 1) * $subDepartments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subDepartment = new SubDepartment();
        return view('sub-department.create', compact('subDepartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), SubDepartment::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', true)
                ->with('updating', false);
        }

        $subdepartment = SubDepartment::create($request->all());

        return redirect()->route('sub_departments.index')
            ->with('success', 'sub department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subDepartment = SubDepartment::find($id);

        return view('sub-department.show', compact('subDepartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subDepartment = SubDepartment::find($id);

        return view('sub-department.edit', compact('subDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SubDepartment $subDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), SubDepartment::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', false)
                ->with('updating', true)
                ->with('id', $id);
        }

        $subdepartment = SubDepartment::find($id);
        $subdepartment->update($request->all());

        return redirect()->route('sub_departments.index')
            ->with('success', 'Sub Department updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subDepartment = SubDepartment::find($id)->delete();

        return redirect()->route('sub_departments.index')
            ->with('success', 'SubDepartment deleted successfully');
    }
}
