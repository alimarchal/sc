<?php

namespace App\Http\Controllers;

use App\Models\MonthlyStockSummeryMpr;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlyStockSummeryMprController extends Controller
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

            $collection = QueryBuilder::for(MonthlyStockSummeryMpr::class)
                ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('starts_between'), AllowedFilter::scope('month')])
                ->where('btn', '61 CSB MZD')
                ->get();

        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $collection = QueryBuilder::for(MonthlyStockSummeryMpr::class)
                ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('starts_between'), AllowedFilter::scope('month')])
                ->where('btn', '64 CSB MPR')
                ->get();

        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(MonthlyStockSummeryMpr::class)
                ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('starts_between'), AllowedFilter::scope('month')])
                ->get();
        }

        return view('monthly_stock_summery_mpr.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthly_stock_summery_mpr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlyStockSummeryMpr::create($request->all());
        return redirect()->route('monthlyStockSummeryMpr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MonthlyStockSummeryMpr $monthlyStockSummeryMpr
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyStockSummeryMpr $monthlyStockSummeryMpr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MonthlyStockSummeryMpr $monthlyStockSummeryMpr
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyStockSummeryMpr $monthlyStockSummeryMpr)
    {
        return view('monthly_stock_summery_mpr.edit', compact('monthlyStockSummeryMpr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MonthlyStockSummeryMpr $monthlyStockSummeryMpr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyStockSummeryMpr $monthlyStockSummeryMpr)
    {
        $monthlyStockSummeryMpr->update($request->all());
        return redirect()->route('monthlyStockSummeryMpr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MonthlyStockSummeryMpr $monthlyStockSummeryMpr
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyStockSummeryMpr $monthlyStockSummeryMpr)
    {
        $monthlyStockSummeryMpr->delete();
        return redirect()->route('monthlyStockSummeryMpr.index');
    }
}
