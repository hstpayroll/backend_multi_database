<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

/**
 * Class CalendarController
 * @package App\Http\Controllers
 */
class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $calendars = Calendar::all();
        return view('calendar.index', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calendar = new Calendar();
        return view('calendar.create', compact('calendar'));
    }


    public function store(Request $request)
    {
        // request()->validate(Calendar::$rules);

        $calendar = Calendar::create($request->all());

        return redirect()->route('calendars.index')
            ->with('success', 'Calendar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendar = Calendar::find($id);

        return view('calendar.show', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendar = Calendar::find($id);

        return view('calendar.edit', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Calendar $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        request()->validate(Calendar::$rules);

        $calendar->update($request->all());

        return redirect()->route('calendars.index')
            ->with('success', 'Calendar updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $calendar = Calendar::find($id)->delete();

        return redirect()->route('calendars.index')
            ->with('success', 'Calendar deleted successfully');
    }
}
