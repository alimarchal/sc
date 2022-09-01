<?php

namespace App\Http\Controllers;

use App\Models\WeeklyProgressSpcSphone;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class WeeklyProgressSpcSphoneController extends Controller
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
            $collection = QueryBuilder::for(WeeklyProgressSpcSphone::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Muzaffarabad', 'Bagh', 'Rawalakot'])
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(WeeklyProgressSpcSphone::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Mirpur', 'Kotli', 'Bhimber'])
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(WeeklyProgressSpcSphone::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('weekly_progress_spc_sphone.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weekly_progress_spc_sphone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WeeklyProgressSpcSphone::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('weeklyProgressSpcSphone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WeeklyProgressSpcSphone $weeklyProgressSpcSphone
     * @return \Illuminate\Http\Response
     */
    public function show(WeeklyProgressSpcSphone $weeklyProgressSpcSphone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WeeklyProgressSpcSphone $weeklyProgressSpcSphone
     * @return \Illuminate\Http\Response
     */
    public function edit(WeeklyProgressSpcSphone $weeklyProgressSpcSphone)
    {
        return view('weekly_progress_spc_sphone.edit', compact('weeklyProgressSpcSphone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeeklyProgressSpcSphone $weeklyProgressSpcSphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeeklyProgressSpcSphone $weeklyProgressSpcSphone)
    {
        $weeklyProgressSpcSphone->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('weeklyProgressSpcSphone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WeeklyProgressSpcSphone $weeklyProgressSpcSphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeeklyProgressSpcSphone $weeklyProgressSpcSphone)
    {
        $weeklyProgressSpcSphone->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('weeklyProgressSpcSphone.index');
    }
}
