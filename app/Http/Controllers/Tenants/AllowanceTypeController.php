<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllowanceType;

/**
 * Class AllowanceTypeController
 * @package App\Http\Controllers
 */
class AllowanceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowanceTypes = AllowanceType::paginate();

        return view('allowance-type.index', compact('allowanceTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $allowanceTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allowanceType = new AllowanceType();
        return view('allowance-type.create', compact('allowanceType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AllowanceType::$rules);

        $allowanceType = AllowanceType::create($request->all());

        return redirect()->route('allowance-types.index')
            ->with('success', 'AllowanceType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allowanceType = AllowanceType::find($id);

        return view('allowance-type.show', compact('allowanceType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allowanceType = AllowanceType::find($id);

        return view('allowance-type.edit', compact('allowanceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AllowanceType $allowanceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllowanceType $allowanceType)
    {
        request()->validate(AllowanceType::$rules);

        $allowanceType->update($request->all());

        return redirect()->route('allowance-types.index')
            ->with('success', 'AllowanceType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $allowanceType = AllowanceType::find($id)->delete();

        return redirect()->route('allowance-types.index')
            ->with('success', 'AllowanceType deleted successfully');
    }
}
