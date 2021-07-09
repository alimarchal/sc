<?php

namespace App\Http\Controllers;

use App\Models\MonthlySaleProgress;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MonthlySaleProgressController extends Controller
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

            $collection = QueryBuilder::for(MonthlySaleProgress::class)
                ->allowedFilters(['btn', 'btn_name', 'services', AllowedFilter::scope('month')])
                ->where('btn', '61 CSB MZD')
                ->get();

        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $collection = QueryBuilder::for(MonthlySaleProgress::class)
                ->allowedFilters(['btn', 'btn_name', 'services', AllowedFilter::scope('month')])
                ->where('btn', '64 CSB MPR')
                ->get();

        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(MonthlySaleProgress::class)
                ->allowedFilters(['btn', 'btn_name', 'services', AllowedFilter::scope('month')])
                ->get();
        }


        return view('monthlySaleProgress.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlySaleProgress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MonthlySaleProgress::create($request->all());
        return redirect()->route('monthlySaleProgress.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MonthlySaleProgress $monthlySaleProgress
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlySaleProgress $monthlySaleProgress)
    {
        return view('monthlySaleProgress.show', compact('monthlySaleProgress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MonthlySaleProgress $monthlySaleProgress
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlySaleProgress $monthlySaleProgress)
    {
        return view('monthlySaleProgress.edit', compact('monthlySaleProgress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MonthlySaleProgress $monthlySaleProgress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlySaleProgress $monthlySaleProgress)
    {
        $monthlySaleProgress->update($request->all());
        return redirect()->route('monthlySaleProgress.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MonthlySaleProgress $monthlySaleProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlySaleProgress $monthlySaleProgress)
    {
        $monthlySaleProgress->delete();
        return redirect()->route('monthlySaleProgress.index');
    }
}
