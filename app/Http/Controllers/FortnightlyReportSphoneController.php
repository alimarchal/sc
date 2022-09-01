<?php

namespace App\Http\Controllers;

use App\Models\FortnightlyReportSphone;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FortnightlyReportSphoneController extends Controller
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
            $collection = QueryBuilder::for(FortnightlyReportSphone::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Muzaffarabad', 'Bagh', 'Rawalakot'])
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(FortnightlyReportSphone::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Mirpur', 'Kotli', 'Bhimber'])
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(FortnightlyReportSphone::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('fortnightly_report_sphone.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fortnightly_report_sphone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FortnightlyReportSphone::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('fortnightlyReportSphone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FortnightlyReportSphone $fortnightlyReportSphone
     * @return \Illuminate\Http\Response
     */
    public function show(FortnightlyReportSphone $fortnightlyReportSphone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FortnightlyReportSphone $fortnightlyReportSphone
     * @return \Illuminate\Http\Response
     */
    public function edit(FortnightlyReportSphone $fortnightlyReportSphone)
    {
        return view('fortnightly_report_sphone.edit', compact('fortnightlyReportSphone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FortnightlyReportSphone $fortnightlyReportSphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FortnightlyReportSphone $fortnightlyReportSphone)
    {
        $fortnightlyReportSphone->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('fortnightlyReportSphone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FortnightlyReportSphone $fortnightlyReportSphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(FortnightlyReportSphone $fortnightlyReportSphone)
    {
        $fortnightlyReportSphone->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('fortnightlyReportSphone.index');
    }
}
