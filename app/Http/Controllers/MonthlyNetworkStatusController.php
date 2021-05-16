<?php

namespace App\Http\Controllers;

use App\Models\MonthlyNetworkStatus;
use App\Models\Sphone;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlyNetworkStatusController extends Controller
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
            $collection = QueryBuilder::for(MonthlyNetworkStatus::class)
                ->allowedFilters(['btn', 'company', AllowedFilter::scope('month')])
                ->where('btn', '61 CSB MZD')
                ->orderBy('date', 'desc')->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(MonthlyNetworkStatus::class)
                ->allowedFilters(['btn', 'company', AllowedFilter::scope('month')])
                ->where('btn', '64 CSB MPR')
                ->orderBy('date', 'desc')->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(MonthlyNetworkStatus::class)
                ->allowedFilters(['btn', 'company', AllowedFilter::scope('month')])
                ->orderBy('date', 'desc')->get();
        }

        return view('monthlyNetworkStatus.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlyNetworkStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlyNetworkStatus::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('monthly-network-status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthlyNetworkStatus  $monthlyNetworkStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyNetworkStatus $monthlyNetworkStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthlyNetworkStatus  $monthlyNetworkStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyNetworkStatus $monthlyNetworkStatus)
    {
        return view('monthlyNetworkStatus.edit', compact('monthlyNetworkStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyNetworkStatus  $monthlyNetworkStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyNetworkStatus $monthlyNetworkStatus)
    {
        $monthlyNetworkStatus->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('monthly-network-status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyNetworkStatus  $monthlyNetworkStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyNetworkStatus $monthlyNetworkStatus)
    {
        //
    }
}
