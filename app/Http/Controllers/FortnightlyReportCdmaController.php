<?php

namespace App\Http\Controllers;

use App\Models\FortnightlyReportCdma;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FortnightlyReportCdmaController extends Controller
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
            $collection = QueryBuilder::for(FortnightlyReportCdma::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MZD')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(FortnightlyReportCdma::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MPR')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(FortnightlyReportCdma::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('fortnightly_report_cdma.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fortnightly_report_cdma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FortnightlyReportCdma::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('fortnightlyReportCdma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FortnightlyReportCdma  $fortnightlyReportCdma
     * @return \Illuminate\Http\Response
     */
    public function show(FortnightlyReportCdma $fortnightlyReportCdma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FortnightlyReportCdma  $fortnightlyReportCdma
     * @return \Illuminate\Http\Response
     */
    public function edit(FortnightlyReportCdma $fortnightlyReportCdma)
    {
        return view('fortnightly_report_cdma.edit', compact('fortnightlyReportCdma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FortnightlyReportCdma  $fortnightlyReportCdma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FortnightlyReportCdma $fortnightlyReportCdma)
    {
        $fortnightlyReportCdma->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('fortnightlyReportCdma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FortnightlyReportCdma  $fortnightlyReportCdma
     * @return \Illuminate\Http\Response
     */
    public function destroy(FortnightlyReportCdma $fortnightlyReportCdma)
    {
        $fortnightlyReportCdma->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('fortnightlyReportCdma.index');
    }
}
