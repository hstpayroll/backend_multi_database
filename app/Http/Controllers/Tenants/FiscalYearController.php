<?php

namespace App\Http\Controllers\Tenants;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tenant\FiscalYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('fiscal_year');
        $fiscal_years = FiscalYear::paginate();
        return view('tenants.finance.Fiscal_year.index', compact('fiscal_years'))
            ->with('i', (request()->input('page', 1) - 1) * $fiscal_years->perPage())->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required|date',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', true)
                ->with('updating', false);
        }

        // Parse start_date and calculate end_date
        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = $start_date->copy()->addYear();

        // Add end_date to the request data
        $data = $request->all();
        $data['end_date'] = $end_date;

        // Create FiscalYear with all attributes
        $fiscal_year = FiscalYear::create($data);

        return redirect()->route('fiscal_years.index')
            ->with('success', 'Fiscal Year created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FiscalYear $FiscalYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FiscalYear $FiscalYear)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required|date',
            'description' => 'nullable',
        ]);        

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', false)
                ->with('updating', true)  
                ->with('id', $id);         
        }

        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = $start_date->copy()->addYear();

        $data = $request->all();
        $data['end_date'] = $end_date;

        $fiscal_year = FiscalYear::find($id);
        $fiscal_year->update($data);

        return redirect()->route('fiscal_years.index')
            ->with('success', 'Fiscal Year updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $fiscal_year = FiscalYear::find($id)->delete();

        return redirect()->route('fiscal_years.index')
            ->with('success', 'Fiscal Year deleted successfully');
    }
}
