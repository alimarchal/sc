<?php

namespace App\Http\Controllers;

use App\Models\ConsumerComplaints;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ConsumerComplaintsController extends Controller
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

            $collection = QueryBuilder::for(ConsumerComplaints::class)
                ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('month')])
                ->where('btn_name', '61 CSB MZD')
                ->get();

        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $collection = QueryBuilder::for(ConsumerComplaints::class)
                ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('month')])
                ->where('btn_name', '64 CSB MPR')
                ->get();

        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(ConsumerComplaints::class)
                ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('month')])
                ->get();
        }

        return view('consumerComplaints.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consumerComplaints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        ConsumerComplaints::create($request->all());
        return redirect()->route('consumerComplaints.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ConsumerComplaints $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerComplaints $consumerComplaint)
    {
        return view('consumerComplaints.show', compact('consumerComplaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ConsumerComplaints $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerComplaints $consumerComplaint)
    {
        $consumerComplaints = $consumerComplaint;
        return view('consumerComplaints.edit', compact('consumerComplaints'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ConsumerComplaints $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsumerComplaints $consumerComplaint)
    {
        $consumerComplaint->update($request->all());
        return redirect()->route('consumerComplaints.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ConsumerComplaints $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerComplaints $consumerComplaint)
    {
        $consumerComplaint->delete();
        return redirect()->route('consumerComplaints.index');
    }
}
