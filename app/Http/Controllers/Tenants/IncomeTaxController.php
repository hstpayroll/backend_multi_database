<?php

namespace App\Http\Controllers;

use App\Models\IncomeTax;
use Illuminate\Http\Request;

/**
 * Class IncomeTaxController
 * @package App\Http\Controllers
 */
class IncomeTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomeTaxes = IncomeTax::paginate();

        return view('income-tax.index', compact('incomeTaxes'))
            ->with('i', (request()->input('page', 1) - 1) * $incomeTaxes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incomeTax = new IncomeTax();
        return view('income-tax.create', compact('incomeTax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(IncomeTax::$rules);

        $incomeTax = IncomeTax::create($request->all());

        return redirect()->route('income-taxes.index')
            ->with('success', 'IncomeTax created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incomeTax = IncomeTax::find($id);

        return view('income-tax.show', compact('incomeTax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incomeTax = IncomeTax::find($id);

        return view('income-tax.edit', compact('incomeTax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  IncomeTax $incomeTax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeTax $incomeTax)
    {
        request()->validate(IncomeTax::$rules);

        $incomeTax->update($request->all());

        return redirect()->route('income-taxes.index')
            ->with('success', 'IncomeTax updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $incomeTax = IncomeTax::find($id)->delete();

        return redirect()->route('income-taxes.index')
            ->with('success', 'IncomeTax deleted successfully');
    }
}
