<?php

namespace App\Http\Controllers;

use App\Models\MonthlyDslRevAotr;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlyDslRevAotrController extends Controller
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
            $collection = QueryBuilder::for(MonthlyDslRevAotr::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MZD')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(MonthlyDslRevAotr::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->where('aor', 'AOTR MPR')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(MonthlyDslRevAotr::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('monthly_dsl_rev_aotr.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthly_dsl_rev_aotr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlyDslRevAotr::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('monthlyDslRevAotr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MonthlyDslRevAotr $monthlyDslRevAotr
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyDslRevAotr $monthlyDslRevAotr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MonthlyDslRevAotr $monthlyDslRevAotr
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyDslRevAotr $monthlyDslRevAotr)
    {
        return view('monthly_dsl_rev_aotr.edit', compact('monthlyDslRevAotr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MonthlyDslRevAotr $monthlyDslRevAotr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyDslRevAotr $monthlyDslRevAotr)
    {
        $monthlyDslRevAotr->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('monthlyDslRevAotr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MonthlyDslRevAotr $monthlyDslRevAotr
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyDslRevAotr $monthlyDslRevAotr)
    {
        $monthlyDslRevAotr->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('monthlyDslRevAotr.index');
    }
}
