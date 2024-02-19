<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;

/**
 * Class ExchangeRateController
 * @package App\Http\Controllers
 */
class ExchangeRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchangeRates = ExchangeRate::paginate();

        return view('exchange-rate.index', compact('exchangeRates'))
            ->with('i', (request()->input('page', 1) - 1) * $exchangeRates->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exchangeRate = new ExchangeRate();
        return view('exchange-rate.create', compact('exchangeRate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExchangeRate::$rules);

        $exchangeRate = ExchangeRate::create($request->all());

        return redirect()->route('exchange-rates.index')
            ->with('success', 'ExchangeRate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exchangeRate = ExchangeRate::find($id);

        return view('exchange-rate.show', compact('exchangeRate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exchangeRate = ExchangeRate::find($id);

        return view('exchange-rate.edit', compact('exchangeRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExchangeRate $exchangeRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExchangeRate $exchangeRate)
    {
        request()->validate(ExchangeRate::$rules);

        $exchangeRate->update($request->all());

        return redirect()->route('exchange-rates.index')
            ->with('success', 'ExchangeRate updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $exchangeRate = ExchangeRate::find($id)->delete();

        return redirect()->route('exchange-rates.index')
            ->with('success', 'ExchangeRate deleted successfully');
    }
}
