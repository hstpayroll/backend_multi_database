<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanPaymentRecord;

/**
 * Class LoanPaymentRecordController
 * @package App\Http\Controllers
 */
class LoanPaymentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanPaymentRecords = LoanPaymentRecord::paginate();

        return view('loan-payment-record.index', compact('loanPaymentRecords'))
            ->with('i', (request()->input('page', 1) - 1) * $loanPaymentRecords->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loanPaymentRecord = new LoanPaymentRecord();
        return view('loan-payment-record.create', compact('loanPaymentRecord'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LoanPaymentRecord::$rules);

        $loanPaymentRecord = LoanPaymentRecord::create($request->all());

        return redirect()->route('loan-payment-records.index')
            ->with('success', 'LoanPaymentRecord created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loanPaymentRecord = LoanPaymentRecord::find($id);

        return view('loan-payment-record.show', compact('loanPaymentRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loanPaymentRecord = LoanPaymentRecord::find($id);

        return view('loan-payment-record.edit', compact('loanPaymentRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LoanPaymentRecord $loanPaymentRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanPaymentRecord $loanPaymentRecord)
    {
        request()->validate(LoanPaymentRecord::$rules);

        $loanPaymentRecord->update($request->all());

        return redirect()->route('loan-payment-records.index')
            ->with('success', 'LoanPaymentRecord updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $loanPaymentRecord = LoanPaymentRecord::find($id)->delete();

        return redirect()->route('loan-payment-records.index')
            ->with('success', 'LoanPaymentRecord deleted successfully');
    }
}
