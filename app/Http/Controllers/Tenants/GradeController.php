<?php

namespace App\Http\Controllers\Tenants;

use App\Models\Tenant\Grade;
use Illuminate\Http\Request;
use App\Models\Tenant\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $title = __('grade');
        $company = Company::first();
        $grades = Grade::paginate(5);

        return view('tenants.finance.Department-Section.grade.show', compact('grades'))->with('title', $title)->with('company', $company)
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
        $validator = Validator::make($request->all(), Grade::$rules);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', true)
                ->with('updating', false);
        }

        $grade = Grade::create($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'grade created successfully.');
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Grade::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', false)
                ->with('updating', true)
                ->with('id', $id);
        }

        $grade = Grade::find($id);
        $grade->update($request->all());

        return redirect()->route('grades.index')
            ->with('success', 'Grade updated successfully.');
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
