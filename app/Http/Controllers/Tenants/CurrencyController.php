<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\Request;
use App\Models\Tenant\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

/**
 * Class CurrencyController
 * @package App\Http\Controllers
 */
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('currency');
        $currencies = Currency::paginate();

        return view('tenants.finance.currency.index', compact('currencies'))
            ->with('i', (request()->input('page', 1) - 1) * $currencies->perPage())->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currency = new Currency();
        return view('currency.create', compact('currency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required | size:3',
            'name' => 'required'
        ]);
        try {
            $currency = Currency::create($data);
            Session::flash('success', 'Currency created successfully');
            return redirect()->route('currencies.index');
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error), handle it here
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($request->validator)
                ->with('operation', 'store'); // Set the 'operation' value to 'edit'
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
        $currency = Currency::find($id);

        return view('currency.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::find($id);

        return view('currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $data = $request->validate([
            'code' => 'required|max:3',
            'name' => 'required'
        ]);

        try {
            $currency->update($data);
            Session::flash('success', 'Currency updated successfully');
            return redirect()->route('currencies.index')->with('success', 'Currency updated successfully');
        } catch (\Exception $e) {
            // If an exception occurs (e.g., validation error), handle it here
            return view('tenants.finance.currency.form');// Set the 'operation' value to 'edit'
        }
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $currency = Currency::find($id)->delete();
            Session::flash('success', 'currency deleted successfully');

            return redirect()->route('currencies.index');
        }
        catch (\Exception $e) {
            // Flash error message
            Session::flash('error', 'Error deleting currency: ');

            return redirect()->back()->withInput();
        }
    }
}
