<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

/**
 * Class GradeController
 * @package App\Http\Controllers
 */
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::paginate();

        return view('grade.index', compact('grades'))
            ->with('i', (request()->input('page', 1) - 1) * $grades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grade = new Grade();
        return view('grade.create', compact('grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Grade::$rules);

        $grade = Grade::create($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::find($id);

        return view('grade.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);

        return view('grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        request()->validate(Grade::$rules);

        $grade->update($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grade = Grade::find($id)->delete();

        return redirect()->route('grades.index')
            ->with('success', 'Grade deleted successfully');
    }
}
