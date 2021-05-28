<?php

namespace App\Http\Controllers;

use App\Models\cCaseAotr;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CCaseAotrController extends Controller
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
            $collection = QueryBuilder::for(cCaseAotr::class)
                ->allowedFilters(['aor', 'years'])
                ->where('aor', 'AOTR MZD')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $collection = QueryBuilder::for(cCaseAotr::class)
                ->allowedFilters(['aor', 'years'])
                ->where('aor', 'AOTR MPR')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $collection = QueryBuilder::for(cCaseAotr::class)
                ->allowedFilters(['aor', 'years'])
                ->get();
        }

        return view('ccase_aotr.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ccase_aotr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        cCaseAotr::create($request->all());
        session()->flash('message', 'Record successfully saved.');
        return redirect()->route('cCaseAotr.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\cCaseAotr $cCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function show(cCaseAotr $cCaseAotr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\cCaseAotr $cCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function edit(cCaseAotr $cCaseAotr)
    {
        return view('ccase_aotr.edit', compact('cCaseAotr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\cCaseAotr $cCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cCaseAotr $cCaseAotr)
    {
        $cCaseAotr->update($request->all());
        session()->flash('message', 'Record successfully updated.');
        return redirect()->route('cCaseAotr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\cCaseAotr $cCaseAotr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cCaseAotr $cCaseAotr)
    {
        $cCaseAotr->delete();
        session()->flash('message', 'Record successfully deleted.');
        return redirect()->route('cCaseAotr.index');
    }
}
