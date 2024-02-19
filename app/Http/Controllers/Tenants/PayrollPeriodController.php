<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayrollPeriod;

/**
 * Class PayrollPeriodController
 * @package App\Http\Controllers
 */
class PayrollPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrollPeriods = PayrollPeriod::paginate();

        return view('payroll-period.index', compact('payrollPeriods'))
            ->with('i', (request()->input('page', 1) - 1) * $payrollPeriods->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payrollPeriod = new PayrollPeriod();
        return view('payroll-period.create', compact('payrollPeriod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PayrollPeriod::$rules);

        $payrollPeriod = PayrollPeriod::create($request->all());

        return redirect()->route('payroll-periods.index')
            ->with('success', 'PayrollPeriod created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payrollPeriod = PayrollPeriod::find($id);

        return view('payroll-period.show', compact('payrollPeriod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payrollPeriod = PayrollPeriod::find($id);

        return view('payroll-period.edit', compact('payrollPeriod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PayrollPeriod $payrollPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayrollPeriod $payrollPeriod)
    {
        request()->validate(PayrollPeriod::$rules);

        $payrollPeriod->update($request->all());

        return redirect()->route('payroll-periods.index')
            ->with('success', 'PayrollPeriod updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $payrollPeriod = PayrollPeriod::find($id)->delete();

        return redirect()->route('payroll-periods.index')
            ->with('success', 'PayrollPeriod deleted successfully');
    }
}
