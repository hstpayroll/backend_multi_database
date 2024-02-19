<?php

namespace App\Http\Controllers;

use App\Models\TaxRegion;
use Illuminate\Http\Request;

/**
 * Class TaxRegionController
 * @package App\Http\Controllers
 */
class TaxRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxRegions = TaxRegion::paginate();

        return view('tax-region.index', compact('taxRegions'))
            ->with('i', (request()->input('page', 1) - 1) * $taxRegions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxRegion = new TaxRegion();
        return view('tax-region.create', compact('taxRegion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TaxRegion::$rules);

        $taxRegion = TaxRegion::create($request->all());

        return redirect()->route('tax-regions.index')
            ->with('success', 'TaxRegion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxRegion = TaxRegion::find($id);

        return view('tax-region.show', compact('taxRegion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxRegion = TaxRegion::find($id);

        return view('tax-region.edit', compact('taxRegion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TaxRegion $taxRegion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxRegion $taxRegion)
    {
        request()->validate(TaxRegion::$rules);

        $taxRegion->update($request->all());

        return redirect()->route('tax-regions.index')
            ->with('success', 'TaxRegion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $taxRegion = TaxRegion::find($id)->delete();

        return redirect()->route('tax-regions.index')
            ->with('success', 'TaxRegion deleted successfully');
    }
}
