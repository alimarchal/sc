<?php

namespace App\Http\Controllers;

use App\Models\CourtCaseAotr;
use App\Models\SimsSale;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SimsSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //simSale
        $collection = QueryBuilder::for(SimsSale::class)
            ->allowedFilters(['type', 'btn_name', 'name', AllowedFilter::scope('month')])
            ->get();
//        $collection = CourtCaseSec::all();
        return view('SimsSale.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SimsSale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SimsSale::create($request->all());
        return redirect()->route('simSale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimsSale  $simsSale
     * @return \Illuminate\Http\Response
     */
    public function show(SimsSale $simsSale)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimsSale  $simsSale
     * @return \Illuminate\Http\Response
     */
    public function edit(SimsSale $simSale)
    {
        return view('SimsSale.edit',compact('simSale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimsSale  $simsSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimsSale $simSale)
    {
        $simSale->update($request->all());
        return redirect()->route('simSale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimsSale  $simsSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimsSale $simSale)
    {
        $simSale->delete();
        return redirect()->route('simSale.index');
    }
}
