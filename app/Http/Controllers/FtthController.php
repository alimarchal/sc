<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFtthRequest;
use App\Http\Requests\UpdateFtthRequest;
use App\Models\Ftth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FtthController extends Controller
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
            $collection = QueryBuilder::for(Ftth::class)
                ->allowedFilters(['btn', 'location', 'type_of_exchange', 'company', AllowedFilter::scope('month')])
                ->where('btn', '61 CSB MZD')
                ->orderBy('date', 'desc')->paginate(25)->withQueryString();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(Ftth::class)
                ->allowedFilters(['btn', 'location', 'type_of_exchange', 'company', AllowedFilter::scope('month')])
                ->where('btn', '64 CSB MPR')
                ->orderBy('date', 'desc')->paginate(25)->withQueryString();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(Ftth::class)
                ->allowedFilters(['btn', 'location', 'type_of_exchange', 'company', AllowedFilter::scope('month')])
                ->orderBy('date', 'desc')->paginate(25)->withQueryString();
        }
        return view('ftth.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ftth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreFtthRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFtthRequest $request)
    {
        Ftth::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('ftth.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ftth $ftth
     * @return \Illuminate\Http\Response
     */
    public function show(Ftth $ftth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ftth $ftth
     * @return \Illuminate\Http\Response
     */
    public function edit(Ftth $ftth)
    {
        return view('ftth.edit', compact('ftth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateFtthRequest $request
     * @param \App\Models\Ftth $ftth
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFtthRequest $request, Ftth $ftth)
    {
        $ftth->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('ftth.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ftth $ftth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ftth $ftth)
    {
        $ftth->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('ftth.index');
    }
}
