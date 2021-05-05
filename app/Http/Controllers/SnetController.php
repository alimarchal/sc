<?php

namespace App\Http\Controllers;

use App\Models\Snet;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(Snet::class)
            ->allowedFilters(['btn','dsl_site', 'company', AllowedFilter::scope('month')])
            ->get();
        return view('snet.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Snet::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('snet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Snet $snet
     * @return \Illuminate\Http\Response
     */
    public function show(Snet $snet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Snet $snet
     * @return \Illuminate\Http\Response
     */
    public function edit(Snet $snet)
    {
        return view('snet.edit', compact('snet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Snet $snet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snet $snet)
    {
        $snet->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('snet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Snet $snet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snet $snet)
    {
        $snet->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('snet.index');
    }
}
