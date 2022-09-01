<?php

namespace App\Http\Controllers;

use App\Models\CourtCaseSec;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CourtCaseSecController extends Controller
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
            $collection = QueryBuilder::for(CourtCaseSec::class)
                ->allowedFilters(['district', 'region', 'date', AllowedFilter::scope('starts_between'), AllowedFilter::scope('month')])
                ->where('region', 'AOTR MZD')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $collection = QueryBuilder::for(CourtCaseSec::class)
                ->allowedFilters(['district', 'region', 'date', AllowedFilter::scope('starts_between'), AllowedFilter::scope('month')])
                ->where('region', 'AOTR MPR')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(CourtCaseSec::class)
                ->allowedFilters(['district', 'region', 'date', AllowedFilter::scope('starts_between'), AllowedFilter::scope('month')])
                ->get();
        }
        return view('court.court-case-secs.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('court.court-case-secs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CourtCaseSec::create($request->all());
        return redirect()->route('courtCaseSecs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CourtCaseSec $courtCaseSec
     * @return \Illuminate\Http\Response
     */
    public function show(CourtCaseSec $courtCaseSec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CourtCaseSec $courtCaseSec
     * @return \Illuminate\Http\Response
     */
    public function edit(CourtCaseSec $courtCaseSec)
    {
        return view('court.court-case-secs.edit', compact('courtCaseSec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourtCaseSec $courtCaseSec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourtCaseSec $courtCaseSec)
    {
        $courtCaseSec->update($request->all());
        return redirect()->route('courtCaseSecs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CourtCaseSec $courtCaseSec
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourtCaseSec $courtCaseSec)
    {
        $courtCaseSec->delete();
        return redirect()->route('courtCaseSecs.index');
    }
}
