<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubDepartment;

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
        $subDepartments = SubDepartment::paginate();

        return view('sub-department.index', compact('subDepartments'))
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
        request()->validate(SubDepartment::$rules);

        $subDepartment = SubDepartment::create($request->all());

        return redirect()->route('sub-departments.index')
            ->with('success', 'SubDepartment created successfully.');
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
    public function update(Request $request, SubDepartment $subDepartment)
    {
        request()->validate(SubDepartment::$rules);

        $subDepartment->update($request->all());

        return redirect()->route('sub-departments.index')
            ->with('success', 'SubDepartment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subDepartment = SubDepartment::find($id)->delete();

        return redirect()->route('sub-departments.index')
            ->with('success', 'SubDepartment deleted successfully');
    }
}
