<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use Illuminate\Http\Request;

/**
 * Class CitizenshipController
 * @package App\Http\Controllers
 */
class CitizenshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizenships = Citizenship::paginate();

        return view('citizenship.index', compact('citizenships'))
            ->with('i', (request()->input('page', 1) - 1) * $citizenships->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citizenship = new Citizenship();
        return view('citizenship.create', compact('citizenship'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Citizenship::$rules);

        $citizenship = Citizenship::create($request->all());

        return redirect()->route('citizenships.index')
            ->with('success', 'Citizenship created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citizenship = Citizenship::find($id);

        return view('citizenship.show', compact('citizenship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citizenship = Citizenship::find($id);

        return view('citizenship.edit', compact('citizenship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Citizenship $citizenship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizenship $citizenship)
    {
        request()->validate(Citizenship::$rules);

        $citizenship->update($request->all());

        return redirect()->route('citizenships.index')
            ->with('success', 'Citizenship updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $citizenship = Citizenship::find($id)->delete();

        return redirect()->route('citizenships.index')
            ->with('success', 'Citizenship deleted successfully');
    }
}
