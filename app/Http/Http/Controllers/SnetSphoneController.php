<?php

namespace App\Http\Controllers;

use App\Models\SnetSphone;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SnetSphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(SnetSphone::class)
            ->allowedFilters(['type', 'btn', 'district', 'location_site', 'company', AllowedFilter::scope('month')])
            ->get();
        return view('snet_sphones.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snet_sphones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SnetSphone::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('snet-sphone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SnetSphone $snetSphone
     * @return \Illuminate\Http\Response
     */
    public function show(SnetSphone $snetSphone)
    {
        return view('snet_sphones.show', compact('snetSphone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SnetSphone $snetSphone
     * @return \Illuminate\Http\Response
     */
    public function edit(SnetSphone $snetSphone)
    {
        return view('snet_sphones.edit', compact('snetSphone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SnetSphone $snetSphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SnetSphone $snetSphone)
    {
        $snetSphone->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('snet-sphone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SnetSphone $snetSphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(SnetSphone $snetSphone)
    {
        $snetSphone->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('snet-sphone.index');
    }
}
