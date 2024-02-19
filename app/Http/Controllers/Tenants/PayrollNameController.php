<?php

namespace App\Http\Controllers;

use App\Models\PayrollName;
use Illuminate\Http\Request;

/**
 * Class PayrollNameController
 * @package App\Http\Controllers
 */
class PayrollNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrollNames = PayrollName::paginate();

        return view('payroll-name.index', compact('payrollNames'))
            ->with('i', (request()->input('page', 1) - 1) * $payrollNames->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payrollName = new PayrollName();
        return view('payroll-name.create', compact('payrollName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PayrollName::$rules);

        $payrollName = PayrollName::create($request->all());

        return redirect()->route('payroll-names.index')
            ->with('success', 'PayrollName created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payrollName = PayrollName::find($id);

        return view('payroll-name.show', compact('payrollName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payrollName = PayrollName::find($id);

        return view('payroll-name.edit', compact('payrollName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PayrollName $payrollName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayrollName $payrollName)
    {
        request()->validate(PayrollName::$rules);

        $payrollName->update($request->all());

        return redirect()->route('payroll-names.index')
            ->with('success', 'PayrollName updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $payrollName = PayrollName::find($id)->delete();

        return redirect()->route('payroll-names.index')
            ->with('success', 'PayrollName deleted successfully');
    }
}
