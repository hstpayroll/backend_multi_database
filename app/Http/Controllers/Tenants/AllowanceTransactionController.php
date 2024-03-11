<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AllowanceTransactionController
 * @package App\Http\Controllers
 */
class AllowanceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowanceTransactions = AllowanceTransaction::paginate();

        return view('allowance-transaction.index', compact('allowanceTransactions'))
            ->with('i', (request()->input('page', 1) - 1) * $allowanceTransactions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allowanceTransaction = new AllowanceTransaction();
        return view('allowance-transaction.create', compact('allowanceTransaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AllowanceTransaction::$rules);

        $allowanceTransaction = AllowanceTransaction::create($request->all());

        return redirect()->route('allowance-transactions.index')
            ->with('success', 'AllowanceTransaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allowanceTransaction = AllowanceTransaction::find($id);

        return view('allowance-transaction.show', compact('allowanceTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allowanceTransaction = AllowanceTransaction::find($id);

        return view('allowance-transaction.edit', compact('allowanceTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AllowanceTransaction $allowanceTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllowanceTransaction $allowanceTransaction)
    {
        request()->validate(AllowanceTransaction::$rules);

        $allowanceTransaction->update($request->all());

        return redirect()->route('allowance-transactions.index')
            ->with('success', 'AllowanceTransaction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $allowanceTransaction = AllowanceTransaction::find($id)->delete();

        return redirect()->route('allowance-transactions.index')
            ->with('success', 'AllowanceTransaction deleted successfully');
    }
}
