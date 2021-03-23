<?php

namespace App\Http\Controllers;

use App\Models\CourtCaseAotr;
use App\Models\CustomerServiceCenter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CustomerServiceCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = QueryBuilder::for(CustomerServiceCenter::class)
            ->allowedFilters(['loc_of_csc', 'svsc', AllowedFilter::scope('starts_between')])
            ->get();
        return view('customerServiceCenter.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CustomerServiceCenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CustomerServiceCenter::create($request->all());
        return redirect()->route('customerServiceCenter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerServiceCenter  $customerServiceCenter
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerServiceCenter $customerServiceCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerServiceCenter  $customerServiceCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerServiceCenter $customerServiceCenter)
    {
        return view('customerServiceCenter.edit',compact('customerServiceCenter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerServiceCenter  $customerServiceCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerServiceCenter $customerServiceCenter)
    {
        $customerServiceCenter->update($request->all());
        return redirect()->route('customerServiceCenter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerServiceCenter  $customerServiceCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerServiceCenter $customerServiceCenter)
    {
        $customerServiceCenter->delete();
        return redirect()->route('customerServiceCenter.index');
    }
}
