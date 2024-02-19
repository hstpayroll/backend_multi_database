<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\Http\Request;

/**
 * Class LoanTypeController
 * @package App\Http\Controllers
 */
class LoanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanTypes = LoanType::paginate();

        return view('loan-type.index', compact('loanTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $loanTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loanType = new LoanType();
        return view('loan-type.create', compact('loanType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LoanType::$rules);

        $loanType = LoanType::create($request->all());

        return redirect()->route('loan-types.index')
            ->with('success', 'LoanType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loanType = LoanType::find($id);

        return view('loan-type.show', compact('loanType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loanType = LoanType::find($id);

        return view('loan-type.edit', compact('loanType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LoanType $loanType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanType $loanType)
    {
        request()->validate(LoanType::$rules);

        $loanType->update($request->all());

        return redirect()->route('loan-types.index')
            ->with('success', 'LoanType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $loanType = LoanType::find($id)->delete();

        return redirect()->route('loan-types.index')
            ->with('success', 'LoanType deleted successfully');
    }
}
