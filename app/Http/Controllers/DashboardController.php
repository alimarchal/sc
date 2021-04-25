<?php

namespace App\Http\Controllers;

use App\Models\BtsTower;
use App\Models\RevenueTarget;
use App\Models\Snet;
use App\Models\Sphone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bts_tower_count = BtsTower::count();

        //whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
//
        $revenue_sum = RevenueTarget::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        $revenue_sum_mpr = RevenueTarget::where('aor','AOTR MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        $revenue_sum_mzd = RevenueTarget::where('aor','AOTR MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        $revenue = [
            'scom_ach' => $revenue_sum->sum('scom_ach'),
            'snet_ach' => $revenue_sum->sum('snet_ach'),
            'sphone_ach' => $revenue_sum->sum('sphone_ach'),
            'dxx_ach' => $revenue_sum->sum('dxx_ach'),
        ];
        $revenue_total = null;
        foreach($revenue as $x)
           $revenue_total = $revenue_total + $x;

        $sphone_wc = Sphone::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        $snet_as = Snet::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');

        $sphone = Sphone::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        $working_slot = $sphone->sum('capacity');
        $free_slot = ($sphone->sum('capacity') - $sphone->sum('wc'));
        $slots = [
            'wroking_slot' => $working_slot,
            'free_slot' => $free_slot
        ];
//        dd(Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString());
//        DB::enableQueryLog();
        $customer_trend = DB::table('sphones')
            ->select(DB::raw('MONTHNAME(date) as month, sum(pmc) as pmc, sum(ntc) as ntc'))
            ->whereBetween('created_at',[Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(),Carbon::parse(now())->endOfMonth()->toDateString()])
            ->groupBy(DB::raw('YEAR(date), MONTH(date)'))
            ->get();



        $customer_trend_revenue_mpr = DB::table('revenue_targets')
            ->select(DB::raw('aor as unit, MONTHNAME(date) as month, (sum(scom_ach) + sum(snet_ach) + SUM(sphone_ach) + SUM(dxx_ach)) as total'))
            ->where('aor', 'AOTR MPR')
            ->whereBetween('created_at',[Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(),Carbon::parse(now())->endOfMonth()->toDateString()])
            ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
            ->orderBy('date', 'desc')->get();

        $customer_trend_revenue_mzd = DB::table('revenue_targets')
            ->select(DB::raw('aor as unit, MONTHNAME(date) as month, (sum(scom_ach) + sum(snet_ach) + SUM(sphone_ach) + SUM(dxx_ach)) as total'))
            ->where('aor', 'AOTR MZD')
            ->whereBetween('created_at',[Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(),Carbon::parse(now())->endOfMonth()->toDateString()])
            ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
            ->orderBy('date', 'desc')->get();


        return view('layouts.master',compact('customer_trend_revenue_mpr','customer_trend_revenue_mzd','bts_tower_count','revenue_total','sphone_wc','snet_as','slots','customer_trend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
