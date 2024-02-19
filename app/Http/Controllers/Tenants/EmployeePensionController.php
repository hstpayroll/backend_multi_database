<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePension;

/**
 * Class EmployeePensionController
 * @package App\Http\Controllers
 */
class EmployeePensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeePensions = EmployeePension::paginate();

        return view('employee-pension.index', compact('employeePensions'))
            ->with('i', (request()->input('page', 1) - 1) * $employeePensions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeePension = new EmployeePension();
        return view('employee-pension.create', compact('employeePension'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmployeePension::$rules);

        $employeePension = EmployeePension::create($request->all());

        return redirect()->route('employee-pensions.index')
            ->with('success', 'EmployeePension created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeePension = EmployeePension::find($id);

        return view('employee-pension.show', compact('employeePension'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeePension = EmployeePension::find($id);

        return view('employee-pension.edit', compact('employeePension'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeePension $employeePension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeePension $employeePension)
    {
        request()->validate(EmployeePension::$rules);

        $employeePension->update($request->all());

        return redirect()->route('employee-pensions.index')
            ->with('success', 'EmployeePension updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeePension = EmployeePension::find($id)->delete();

        return redirect()->route('employee-pensions.index')
            ->with('success', 'EmployeePension deleted successfully');
    }
}
