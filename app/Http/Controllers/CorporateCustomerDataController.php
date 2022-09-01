<?php

namespace App\Http\Controllers;

use App\Models\CorporateCustomerData;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CorporateCustomerDataController extends Controller
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

            $collection = QueryBuilder::for(CorporateCustomerData::class)
                ->allowedFilters(['type', 'btn_name', 'district', AllowedFilter::scope('month')])
                ->where('btn_name', '61 CSB MZD')
                ->get();

        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $collection = QueryBuilder::for(CorporateCustomerData::class)
                ->allowedFilters(['type', 'btn_name', 'district', AllowedFilter::scope('month')])
                ->where('btn_name', '64 CSB MPR')
                ->get();

        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {

            $collection = QueryBuilder::for(CorporateCustomerData::class)
                ->allowedFilters(['type', 'btn_name', 'district', AllowedFilter::scope('month')])
                ->get();
        }

        return view('CorporateCustomerData.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CorporateCustomerData.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CorporateCustomerData::create($request->all());
        return redirect()->route('corporateCustomer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CorporateCustomerData $corporateCustomerData
     * @return \Illuminate\Http\Response
     */
    public function show(CorporateCustomerData $corporateCustomerData)
    {

        return view('CorporateCustomerData.show', compact('corporateCustomer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CorporateCustomerData $corporateCustomerData
     * @return \Illuminate\Http\Response
     */
    public function edit(CorporateCustomerData $corporateCustomer)
    {
        return view('CorporateCustomerData.edit', compact('corporateCustomer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CorporateCustomerData $corporateCustomerData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorporateCustomerData $corporateCustomer)
    {
        $corporateCustomer->update($request->all());
        return redirect()->route('corporateCustomer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CorporateCustomerData $corporateCustomerData
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorporateCustomerData $corporateCustomer)
    {
        $corporateCustomer->delete();
        return redirect()->route('corporateCustomer.index');
    }
}
