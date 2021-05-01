<?php

namespace App\Http\Controllers;

use App\Models\CourtCaseAotr;
use App\Models\CourtCaseSec;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CourtCaseAotrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(CourtCaseAotr::class)
            ->allowedFilters(['district','region','particulars', AllowedFilter::scope('month')])
            ->get();
//        $collection = CourtCaseSec::all();
        return view('court.court-case-aotr.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('court.court-case-aotr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CourtCaseAotr::create($request->all());
        return redirect()->route('courtCaseAotr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourtCaseAotr  $courtCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function show(CourtCaseAotr $courtCaseAotr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourtCaseAotr  $courtCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function edit(CourtCaseAotr $courtCaseAotr)
    {
        return view('court.court-case-aotr.edit',compact('courtCaseAotr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourtCaseAotr  $courtCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourtCaseAotr $courtCaseAotr)
    {
        $courtCaseAotr->update($request->all());
        return redirect()->route('courtCaseAotr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourtCaseAotr  $courtCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourtCaseAotr $courtCaseAotr)
    {
        $courtCaseAotr->delete();
        return redirect()->route('courtCaseAotr.index');
    }
}
