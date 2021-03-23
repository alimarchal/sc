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
        $collection = QueryBuilder::for(ConsumerComplaints::class)
            ->allowedFilters(['district', AllowedFilter::scope('starts_between')])
            ->get();
        return view('court.court-case-aotr.index', compact('collection'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ConsumerComplaints::create($request->all());
        return redirect()->route('consumerComplaints.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumerComplaints  $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumerComplaints $consumerComplaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumerComplaints  $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsumerComplaints $consumerComplaints)
    {
        return view('consumerComplaints.edit',compact('courtCaseAotr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumerComplaints  $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsumerComplaints $consumerComplaints)
    {
        $consumerComplaints->update($request->all());
        return redirect()->route('consumerComplaints.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumerComplaints  $consumerComplaints
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsumerComplaints $consumerComplaints)
    {
        $consumerComplaints->delete();
        return redirect()->route('consumerComplaints.index');
    }
}
