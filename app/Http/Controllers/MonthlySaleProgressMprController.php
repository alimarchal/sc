<?php

namespace App\Http\Controllers;

use App\Models\MonthlySaleProgressMpr;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlySaleProgressMprController extends Controller
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

            $collection = QueryBuilder::for(MonthlySaleProgressMpr::class)
                ->allowedFilters(['btn', 'btn_name',  'services',  AllowedFilter::scope('month')])
                ->where('btn', '61 CSB MZD')
                ->get();

        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $collection = QueryBuilder::for(MonthlySaleProgressMpr::class)
                ->allowedFilters(['btn', 'btn_name',  'services',  AllowedFilter::scope('month')])
                ->where('btn', '64 CSB MPR')
                ->get();

        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(MonthlySaleProgressMpr::class)
                ->allowedFilters(['btn', 'btn_name',  'services',  AllowedFilter::scope('month')])
                ->get();
        }

        return view('monthly_sale_progress_mpr.index', compact('collection'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthly_sale_progress_mpr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlySaleProgressMpr::create($request->all());
        return redirect()->route('monthlySaleProgressMpr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MonthlySaleProgressMpr $monthlySaleProgressMpr
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlySaleProgressMpr $monthlySaleProgressMpr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MonthlySaleProgressMpr $monthlySaleProgressMpr
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlySaleProgressMpr $monthlySaleProgressMpr)
    {
        return view('monthly_sale_progress_mpr.edit', compact('monthlySaleProgressMpr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MonthlySaleProgressMpr $monthlySaleProgressMpr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlySaleProgressMpr $monthlySaleProgressMpr)
    {
        $monthlySaleProgressMpr->update($request->all());
        return redirect()->route('monthlySaleProgressMpr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MonthlySaleProgressMpr $monthlySaleProgressMpr
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlySaleProgressMpr $monthlySaleProgressMpr)
    {
        $monthlySaleProgressMpr->delete();
        return redirect()->route('monthlySaleProgressMpr.index');
    }
}
