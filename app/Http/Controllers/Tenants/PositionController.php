<?php

namespace App\Http\Controllers\Tenants;

use Illuminate\Http\Request;
use App\Models\Tenant\Company;
use App\Models\Tenant\Position;
use App\Models\Tenant\Department;
use App\Http\Controllers\Controller;
use App\Models\Tenant\SubDepartment;
use Illuminate\Support\Facades\Validator;

/**
 * Class PositionController
 * @package App\Http\Controllers
 */
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('position');
        $company = Company::first();
        $subdepartments = SubDepartment::all();
        $positions = Position::with('subdepartment')->paginate(5);

        return view('tenants.finance.Department-Section.position.show', compact('positions'))->with('title', $title)->with('company', $company)->with('subdepartments', $subdepartments)
            ->with('i', (request()->input('page', 1) - 1) * $positions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = new Position();
        return view('position.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Position::$rules);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', true)
                ->with('updating', false);
        }

        $position = Position::create($request->all());

        return redirect()->route('positions.index')
            ->with('success', 'Position created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);

        return view('position.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);

        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Position $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Position::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('creating', false)
                ->with('updating', true)
                ->with('id', $id);
        }

        $positioon = Position::find($id);
        $positioon->update($request->all());

        return redirect()->route('positions.index')
            ->with('success', 'Postion updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $position = Position::find($id)->delete();

        return redirect()->route('positions.index')
            ->with('success', 'Position deleted successfully');
    }
}
