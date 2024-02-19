<?php

namespace App\Http\Controllers;

use App\Models\PayrollType;
use Illuminate\Http\Request;

/**
 * Class PayrollTypeController
 * @package App\Http\Controllers
 */
class PayrollTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrollTypes = PayrollType::paginate();

        return view('payroll-type.index', compact('payrollTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $payrollTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payrollType = new PayrollType();
        return view('payroll-type.create', compact('payrollType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PayrollType::$rules);

        $payrollType = PayrollType::create($request->all());

        return redirect()->route('payroll-types.index')
            ->with('success', 'PayrollType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payrollType = PayrollType::find($id);

        return view('payroll-type.show', compact('payrollType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payrollType = PayrollType::find($id);

        return view('payroll-type.edit', compact('payrollType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PayrollType $payrollType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayrollType $payrollType)
    {
        request()->validate(PayrollType::$rules);

        $payrollType->update($request->all());

        return redirect()->route('payroll-types.index')
            ->with('success', 'PayrollType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $payrollType = PayrollType::find($id)->delete();

        return redirect()->route('payroll-types.index')
            ->with('success', 'PayrollType deleted successfully');
    }
}
