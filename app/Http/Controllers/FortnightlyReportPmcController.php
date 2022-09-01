<?php

namespace App\Http\Controllers;

use App\Models\FortnightlyReportPmc;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FortnightlyReportPmcController extends Controller
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
            $collection = QueryBuilder::for(FortnightlyReportPmc::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Muzaffarabad', 'Bagh', 'Rawalakot'])
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(FortnightlyReportPmc::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Mirpur', 'Kotli', 'Bhimber'])
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(FortnightlyReportPmc::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('fortnightly_report_pmc.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fortnightly_report_pmc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FortnightlyReportPmc::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('fortnightlyReportPmc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FortnightlyReportPmc  $fortnightlyReportPmc
     * @return \Illuminate\Http\Response
     */
    public function show(FortnightlyReportPmc $fortnightlyReportPmc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FortnightlyReportPmc  $fortnightlyReportPmc
     * @return \Illuminate\Http\Response
     */
    public function edit(FortnightlyReportPmc $fortnightlyReportPmc)
    {
        return view('fortnightly_report_pmc.edit', compact('fortnightlyReportPmc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FortnightlyReportPmc  $fortnightlyReportPmc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FortnightlyReportPmc $fortnightlyReportPmc)
    {
        $fortnightlyReportPmc->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('fortnightlyReportPmc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FortnightlyReportPmc  $fortnightlyReportPmc
     * @return \Illuminate\Http\Response
     */
    public function destroy(FortnightlyReportPmc $fortnightlyReportPmc)
    {
        $fortnightlyReportPmc->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('fortnightlyReportPmc.index');
    }
}
