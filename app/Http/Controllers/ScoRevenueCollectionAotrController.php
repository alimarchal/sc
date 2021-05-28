<?php

namespace App\Http\Controllers;

use App\Models\ScoRevenueCollectionAotr;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ScoRevenueCollectionAotrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $collection = QueryBuilder::for(ScoRevenueCollectionAotr::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MZD')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(ScoRevenueCollectionAotr::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MPR')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(ScoRevenueCollectionAotr::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('sco_revenue_collection_aotr.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sco_revenue_collection_aotr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ScoRevenueCollectionAotr::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('scoRevenueCollectionAotr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ScoRevenueCollectionAotr $scoRevenueCollectionAotr
     * @return \Illuminate\Http\Response
     */
    public function show(ScoRevenueCollectionAotr $scoRevenueCollectionAotr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ScoRevenueCollectionAotr $scoRevenueCollectionAotr
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoRevenueCollectionAotr $scoRevenueCollectionAotr)
    {
        return view('sco_revenue_collection_aotr.edit', compact('scoRevenueCollectionAotr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ScoRevenueCollectionAotr $scoRevenueCollectionAotr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScoRevenueCollectionAotr $scoRevenueCollectionAotr)
    {
        $scoRevenueCollectionAotr->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('cCaseAotr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ScoRevenueCollectionAotr $scoRevenueCollectionAotr
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoRevenueCollectionAotr $scoRevenueCollectionAotr)
    {
        $scoRevenueCollectionAotr->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('scoRevenueCollectionAotr.index');
    }
}
