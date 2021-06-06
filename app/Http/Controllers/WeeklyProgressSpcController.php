<?php

namespace App\Http\Controllers;

use App\Models\WeeklyProgressSpc;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class WeeklyProgressSpcController extends Controller
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
            $collection = QueryBuilder::for(WeeklyProgressSpc::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MZD')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(WeeklyProgressSpc::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MPR')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(WeeklyProgressSpc::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('weekly_progress_spc.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weekly_progress_spc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        WeeklyProgressSpc::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('weeklyProgressSpc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WeeklyProgressSpc $weeklyProgressSpc
     * @return \Illuminate\Http\Response
     */
    public function show(WeeklyProgressSpc $weeklyProgressSpc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WeeklyProgressSpc $weeklyProgressSpc
     * @return \Illuminate\Http\Response
     */
    public function edit(WeeklyProgressSpc $weeklyProgressSpc)
    {
        return view('weekly_progress_spc.edit', compact('weeklyProgressSpc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeeklyProgressSpc $weeklyProgressSpc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeeklyProgressSpc $weeklyProgressSpc)
    {
        $weeklyProgressSpc->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('weeklyProgressSpc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WeeklyProgressSpc $weeklyProgressSpc
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeeklyProgressSpc $weeklyProgressSpc)
    {
        $weeklyProgressSpc->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('weeklyProgressSpc.index');
    }
}
