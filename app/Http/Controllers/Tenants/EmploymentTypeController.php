<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmploymentType;

/**
 * Class EmploymentTypeController
 * @package App\Http\Controllers
 */
class EmploymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employmentTypes = EmploymentType::paginate();

        return view('employment-type.index', compact('employmentTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $employmentTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employmentType = new EmploymentType();
        return view('employment-type.create', compact('employmentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmploymentType::$rules);

        $employmentType = EmploymentType::create($request->all());

        return redirect()->route('employment-types.index')
            ->with('success', 'EmploymentType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employmentType = EmploymentType::find($id);

        return view('employment-type.show', compact('employmentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employmentType = EmploymentType::find($id);

        return view('employment-type.edit', compact('employmentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmploymentType $employmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentType $employmentType)
    {
        request()->validate(EmploymentType::$rules);

        $employmentType->update($request->all());

        return redirect()->route('employment-types.index')
            ->with('success', 'EmploymentType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employmentType = EmploymentType::find($id)->delete();

        return redirect()->route('employment-types.index')
            ->with('success', 'EmploymentType deleted successfully');
    }
}
