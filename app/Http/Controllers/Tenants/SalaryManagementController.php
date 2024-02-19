<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryManagement;

/**
 * Class SalaryManagementController
 * @package App\Http\Controllers
 */
class SalaryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaryManagements = SalaryManagement::paginate();

        return view('salary-management.index', compact('salaryManagements'))
            ->with('i', (request()->input('page', 1) - 1) * $salaryManagements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salaryManagement = new SalaryManagement();
        return view('salary-management.create', compact('salaryManagement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SalaryManagement::$rules);

        $salaryManagement = SalaryManagement::create($request->all());

        return redirect()->route('salary-managements.index')
            ->with('success', 'SalaryManagement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salaryManagement = SalaryManagement::find($id);

        return view('salary-management.show', compact('salaryManagement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salaryManagement = SalaryManagement::find($id);

        return view('salary-management.edit', compact('salaryManagement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SalaryManagement $salaryManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryManagement $salaryManagement)
    {
        request()->validate(SalaryManagement::$rules);

        $salaryManagement->update($request->all());

        return redirect()->route('salary-managements.index')
            ->with('success', 'SalaryManagement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salaryManagement = SalaryManagement::find($id)->delete();

        return redirect()->route('salary-managements.index')
            ->with('success', 'SalaryManagement deleted successfully');
    }
}
