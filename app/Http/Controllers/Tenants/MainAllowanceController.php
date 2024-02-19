<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainAllowance;

/**
 * Class MainAllowanceController
 * @package App\Http\Controllers
 */
class MainAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainAllowances = MainAllowance::paginate();

        return view('main-allowance.index', compact('mainAllowances'))
            ->with('i', (request()->input('page', 1) - 1) * $mainAllowances->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainAllowance = new MainAllowance();
        return view('main-allowance.create', compact('mainAllowance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MainAllowance::$rules);

        $mainAllowance = MainAllowance::create($request->all());

        return redirect()->route('main-allowances.index')
            ->with('success', 'MainAllowance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mainAllowance = MainAllowance::find($id);

        return view('main-allowance.show', compact('mainAllowance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainAllowance = MainAllowance::find($id);

        return view('main-allowance.edit', compact('mainAllowance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MainAllowance $mainAllowance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainAllowance $mainAllowance)
    {
        request()->validate(MainAllowance::$rules);

        $mainAllowance->update($request->all());

        return redirect()->route('main-allowances.index')
            ->with('success', 'MainAllowance updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mainAllowance = MainAllowance::find($id)->delete();

        return redirect()->route('main-allowances.index')
            ->with('success', 'MainAllowance deleted successfully');
    }
}
