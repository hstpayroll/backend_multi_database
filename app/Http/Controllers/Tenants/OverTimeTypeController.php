<?php

namespace App\Http\Controllers;

use App\Models\OverTimeType;
use Illuminate\Http\Request;

/**
 * Class OverTimeTypeController
 * @package App\Http\Controllers
 */
class OverTimeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overTimeTypes = OverTimeType::paginate();

        return view('over-time-type.index', compact('overTimeTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $overTimeTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $overTimeType = new OverTimeType();
        return view('over-time-type.create', compact('overTimeType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OverTimeType::$rules);

        $overTimeType = OverTimeType::create($request->all());

        return redirect()->route('over-time-types.index')
            ->with('success', 'OverTimeType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $overTimeType = OverTimeType::find($id);

        return view('over-time-type.show', compact('overTimeType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $overTimeType = OverTimeType::find($id);

        return view('over-time-type.edit', compact('overTimeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OverTimeType $overTimeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OverTimeType $overTimeType)
    {
        request()->validate(OverTimeType::$rules);

        $overTimeType->update($request->all());

        return redirect()->route('over-time-types.index')
            ->with('success', 'OverTimeType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $overTimeType = OverTimeType::find($id)->delete();

        return redirect()->route('over-time-types.index')
            ->with('success', 'OverTimeType deleted successfully');
    }
}
