<?php

namespace App\Http\Controllers;

use App\Models\MonthlyReportPostPaid;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlyReportPostPaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(MonthlyReportPostPaid::class)
            ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('starts_between')])
            ->get();
        return view('monthlyReportPostPaid.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlyReportPostPaid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlyReportPostPaid::create($request->all());
        return redirect()->route('monthlyReportPostPaid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MonthlyReportPostPaid $monthlyReportPostPaid
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyReportPostPaid $monthlyReportPostPaid)
    {
        return view('monthlyReportPostPaid.show', compact('monthlyReportPostPaid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MonthlyReportPostPaid $monthlyReportPostPaid
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyReportPostPaid $monthlyReportPostPaid)
    {
        return view('monthlyReportPostPaid.edit', compact('monthlyReportPostPaid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MonthlyReportPostPaid $monthlyReportPostPaid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyReportPostPaid $monthlyReportPostPaid)
    {
        $monthlyReportPostPaid->update($request->all());
        return redirect()->route('monthlyReportPostPaid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MonthlyReportPostPaid $monthlyReportPostPaid
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyReportPostPaid $monthlyReportPostPaid)
    {
        $monthlyReportPostPaid->delete();
        return redirect()->route('monthlyReportPostPaid.index');
    }
}
