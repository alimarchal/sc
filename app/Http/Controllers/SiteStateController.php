<?php

namespace App\Http\Controllers;

use App\Models\SiteState;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SiteStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(SiteState::class)
            ->allowedFilters(['type', 'btn_name', 'type','site_name', AllowedFilter::scope('month')])
            ->get();
        return view('siteState.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siteState.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SiteState::create($request->all());
        return redirect()->route('siteState.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SiteState $siteState
     * @return \Illuminate\Http\Response
     */
    public function show(SiteState $siteState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SiteState $siteState
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteState $siteState)
    {
        return view('siteState.edit', compact('siteState'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SiteState $siteState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteState $siteState)
    {
        $siteState->update($request->all());
        return redirect()->route('siteState.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SiteState $siteState
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteState $siteState)
    {
        $siteState->delete();
        return redirect()->route('siteState.index');
    }
}
