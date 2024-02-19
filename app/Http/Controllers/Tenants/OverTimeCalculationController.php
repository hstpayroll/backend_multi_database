<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SalaryManagement;
use App\Models\OverTimeCalculation;

/**
 * Class OverTimeCalculationController
 * @package App\Http\Controllers
 */
class OverTimeCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overTimeCalculations = OverTimeCalculation::paginate();

        return view('over-time-calculation.index', compact('overTimeCalculations'))
            ->with('i', (request()->input('page', 1) - 1) * $overTimeCalculations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $overTimeCalculation = new OverTimeCalculation();
        return view('over-time-calculation.create', compact('overTimeCalculation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OverTimeCalculation::$rules);

        $employee = Employee::find($request->employee_id);
        try {
            $overtimeValue = $employee->calculateOvertimeValue($request->ot_hour);

            $overTimeCalculation = OverTimeCalculation::create($request->all() + [
                'ot_value' => $overtimeValue
            ]);
            return redirect()->route('over-time-calculations.index')
            ->with('success', 'OverTimeCalculation created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('over-time-calculations.index')
            ->with('success', 'Salary data is not available for this employee.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $overTimeCalculation = OverTimeCalculation::find($id);

        return view('over-time-calculation.show', compact('overTimeCalculation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $overTimeCalculation = OverTimeCalculation::find($id);

        return view('over-time-calculation.edit', compact('overTimeCalculation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OverTimeCalculation $overTimeCalculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OverTimeCalculation $overTimeCalculation)
    {
        request()->validate(OverTimeCalculation::$rules);

        $overTimeCalculation->update($request->all());

        return redirect()->route('over-time-calculations.index')
            ->with('success', 'OverTimeCalculation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $overTimeCalculation = OverTimeCalculation::find($id)->delete();

        return redirect()->route('over-time-calculations.index')
            ->with('success', 'OverTimeCalculation deleted successfully');
    }
}
