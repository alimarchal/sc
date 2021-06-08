<?php

namespace App\Http\Controllers;

use App\Models\RevenueTarget;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RevenueTargetController extends Controller
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
            $collection = QueryBuilder::for(RevenueTarget::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MZD')
                ->orderBy('date', 'desc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(RevenueTarget::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MPR')
                ->orderBy('date', 'desc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(RevenueTarget::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->orderBy('date', 'desc')
                ->get();
        }

        return view('revenue_target.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revenue_target.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RevenueTarget::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('revenue-target.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RevenueTarget $revenueTarget
     * @return \Illuminate\Http\Response
     */
    public function show(RevenueTarget $revenueTarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RevenueTarget $revenueTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(RevenueTarget $revenueTarget)
    {
        return view('revenue_target.edit', compact('revenueTarget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RevenueTarget $revenueTarget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RevenueTarget $revenueTarget)
    {
        $revenueTarget->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('revenue-target.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RevenueTarget $revenueTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevenueTarget $revenueTarget)
    {
        $revenueTarget->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('revenue-target.index');
    }
}
