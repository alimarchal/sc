<?php

namespace App\Http\Controllers;

use App\Models\RevCollN;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RevCollNController extends Controller
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
            $collection = QueryBuilder::for(RevCollN::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Muzaffarabad', 'Bagh', 'Rawalakot'])
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(RevCollN::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->whereIn('aor', ['Mirpur', 'Kotli', 'Bhimber'])
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(RevCollN::class)
                ->allowedFilters(['aor', AllowedFilter::scope('month')])
                ->get();
        }

        return view('rev_coll_n.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rev_coll_n.create');
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
        RevCollN::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('revCollN.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RevCollN $revCollN
     * @return \Illuminate\Http\Response
     */
    public function show(RevCollN $revCollN)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RevCollN $revCollN
     * @return \Illuminate\Http\Response
     */
    public function edit(RevCollN $revCollN)
    {
        return view('rev_coll_n.edit', compact('revCollN'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RevCollN $revCollN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RevCollN $revCollN)
    {
        $revCollN->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('revCollN.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RevCollN $revCollN
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevCollN $revCollN)
    {
        $revCollN->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('revCollN.index');
    }
}
