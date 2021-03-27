<?php

namespace App\Http\Controllers;

use App\Models\MonthlyStockSummery;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlyStockSummeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(MonthlyStockSummery::class)
            ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('starts_between')])
            ->get();
        return view('monthlyStockSummery.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlyStockSummery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlyStockSummery::create($request->all());
        return redirect()->route('monthlyStockSummery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MonthlyStockSummery $monthlyStockSummery
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyStockSummery $monthlyStockSummery)
    {
        return view('monthlyStockSummery.show', compact('monthlyStockSummery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MonthlyStockSummery $monthlyStockSummery
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyStockSummery $monthlyStockSummery)
    {
        return view('monthlyStockSummery.edit', compact('monthlyStockSummery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MonthlyStockSummery $monthlyStockSummery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyStockSummery $monthlyStockSummery)
    {
        $monthlyStockSummery->update($request->all());
        return redirect()->route('monthlyStockSummery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MonthlyStockSummery $monthlyStockSummery
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyStockSummery $monthlyStockSummery)
    {
        $monthlyStockSummery->delete();
        return redirect()->route('monthlyStockSummery.index');
    }
}
