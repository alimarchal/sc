<?php

namespace App\Http\Controllers;

use App\Models\AllocationSaleTgt;
use Illuminate\Http\Request;

class AllocationSaleTgtController extends Controller
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
            $collection = QueryBuilder::for(Sphone::class)
                ->allowedFilters(['btn', 'location', 'type_of_exchange', 'company', AllowedFilter::scope('month')])
                ->where('btn', '61 CSB MZD')
                ->orderBy('date', 'desc')->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(Sphone::class)
                ->allowedFilters(['btn', 'location', 'type_of_exchange', 'company', AllowedFilter::scope('month')])
                ->where('btn', '64 CSB MPR')
                ->orderBy('date', 'desc')->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(Sphone::class)
                ->allowedFilters(['btn', 'location', 'type_of_exchange', 'company', AllowedFilter::scope('month')])
                ->orderBy('date', 'desc')->get();
        }


        return view('sphone.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sphone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sphone::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('sphone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\AllocationSaleTgt $allocationSaleTgt
     * @return \Illuminate\Http\Response
     */
    public function show(AllocationSaleTgt $allocationSaleTgt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AllocationSaleTgt $allocationSaleTgt
     * @return \Illuminate\Http\Response
     */
    public function edit(AllocationSaleTgt $allocationSaleTgt)
    {
        return view('sphone.edit', compact('sphone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AllocationSaleTgt $allocationSaleTgt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllocationSaleTgt $allocationSaleTgt)
    {
        $sphone->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('sphone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AllocationSaleTgt $allocationSaleTgt
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllocationSaleTgt $allocationSaleTgt)
    {
        $sphone->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('sphone.index');
    }
}
