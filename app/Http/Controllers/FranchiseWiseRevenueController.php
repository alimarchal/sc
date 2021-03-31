<?php

namespace App\Http\Controllers;

use App\Models\FranchiseWiseRevenue;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FranchiseWiseRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(FranchiseWiseRevenue::class)
            ->allowedFilters(['type', 'btn_name', AllowedFilter::scope('starts_between')])
            ->get();
        return view('franchiseWiseRevenue.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franchiseWiseRevenue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FranchiseWiseRevenue::create($request->all());
        return redirect()->route('franchiseWiseRevenue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FranchiseWiseRevenue $franchiseWiseRevenue
     * @return \Illuminate\Http\Response
     */
    public function show(FranchiseWiseRevenue $franchiseWiseRevenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FranchiseWiseRevenue $franchiseWiseRevenue
     * @return \Illuminate\Http\Response
     */
    public function edit(FranchiseWiseRevenue $franchiseWiseRevenue)
    {
        return view('franchiseWiseRevenue.edit', compact('franchiseWiseRevenue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FranchiseWiseRevenue $franchiseWiseRevenue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FranchiseWiseRevenue $franchiseWiseRevenue)
    {
        $franchiseWiseRevenue->update($request->all());
        return redirect()->route('franchiseWiseRevenue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FranchiseWiseRevenue $franchiseWiseRevenue
     * @return \Illuminate\Http\Response
     */
    public function destroy(FranchiseWiseRevenue $franchiseWiseRevenue)
    {
        $franchiseWiseRevenue->delete();
        return redirect()->route('franchiseWiseRevenue.index');
    }
}
