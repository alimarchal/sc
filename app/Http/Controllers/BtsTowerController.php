<?php

namespace App\Http\Controllers;

use App\Models\BtsTower;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BtsTowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $collection = QueryBuilder::for(BtsTower::class)
            ->allowedFilters(['service_type', 'btn', 'connectivity','manned_unmanned', 'district', 'location_site', 'company',AllowedFilter::exact('connectivity'), AllowedFilter::exact('manned_unmanned'),AllowedFilter::exact('service_type'), AllowedFilter::scope('month')])
            ->get();
        return view('bts_tower.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bts_tower.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BtsTower::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('bts-tower.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BtsTower  $btsTower
     * @return \Illuminate\Http\Response
     */
    public function show(BtsTower $btsTower)
    {
         return view('bts_tower.show', compact('btsTower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BtsTower  $btsTower
     * @return \Illuminate\Http\Response
     */
    public function edit(BtsTower $btsTower)
    {
        return view('bts_tower.edit', compact('btsTower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BtsTower  $btsTower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BtsTower $btsTower)
    {
        $btsTower->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('bts-tower.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BtsTower  $btsTower
     * @return \Illuminate\Http\Response
     */
    public function destroy(BtsTower $btsTower)
    {
        $btsTower->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('bts-tower.index');
    }
}
