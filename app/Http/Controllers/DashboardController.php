<?php

namespace App\Http\Controllers;

use App\Models\BtsTower;
use App\Models\RevenueTarget;
use App\Models\Snet;
use App\Models\Sphone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\IFTTTHandler;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $bts_tower_count = BtsTower::count();
        $bts_tower_count = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $bts_tower_count = BtsTower::where('btn', '61 CSB MZD')->count();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $bts_tower_count = BtsTower::where('btn', '64 CSB MPR')->count();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $bts_tower_count = BtsTower::count();
        }




        //whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
//
        $revenue_sum = RevenueTarget::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $revenue_sum = RevenueTarget::where('aor', 'AOTR MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $revenue_sum = RevenueTarget::where('aor', 'AOTR MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $revenue_sum = RevenueTarget::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        }


        $revenue_sum_mpr = RevenueTarget::where('aor', 'AOTR MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        $revenue_sum_mzd = RevenueTarget::where('aor', 'AOTR MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        $revenue = [
            'scom_ach' => $revenue_sum->sum('scom_ach'),
            'snet_ach' => $revenue_sum->sum('snet_ach'),
            'sphone_ach' => $revenue_sum->sum('sphone_ach'),
            'dxx_ach' => $revenue_sum->sum('dxx_ach'),
        ];

        $revenue_total = null;
        foreach ($revenue as $x)
            $revenue_total = $revenue_total + $x;

        $sphone_wc = null;


        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $sphone_wc = Sphone::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $sphone_wc = Sphone::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $sphone_wc = Sphone::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        }

        $snet_as = null;

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $snet_as = Snet::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $snet_as = Snet::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $snet_as = Snet::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');
        }

        $sphone = null;

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $sphone = Sphone::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $sphone = Sphone::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $sphone = Sphone::whereMonth('date', '=', Carbon::parse(Carbon::now())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        }


        $working_slot = $sphone->sum('wc');
        $free_slot = ($sphone->sum('capacity') - $sphone->sum('wc'));



        $slots = [
            'wroking_slot' => $working_slot,
            'free_slot' => $free_slot
        ];



        $customer_trend = null;


        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $customer_trend = DB::table('sphones')
                ->select(DB::raw('MONTHNAME(date) as month, sum(pmc) as pmc, sum(ntc) as ntc'))
                ->where('btn', '61 CSB MZD')
                ->whereBetween('created_at', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('YEAR(date), MONTH(date)'))
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $customer_trend = DB::table('sphones')
                ->select(DB::raw('MONTHNAME(date) as month, sum(pmc) as pmc, sum(ntc) as ntc'))
                ->where('btn', '64 CSB MPR')
                ->whereBetween('created_at', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('YEAR(date), MONTH(date)'))
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $customer_trend = DB::table('sphones')
                ->select(DB::raw('MONTHNAME(date) as month, sum(pmc) as pmc, sum(ntc) as ntc'))
                ->whereBetween('created_at', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('YEAR(date), MONTH(date)'))
                ->get();
        }


        $customer_trend_revenue = null;

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $customer_trend_revenue = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, (sum(scom_ach) + sum(snet_ach) + SUM(sphone_ach) + SUM(dxx_ach)) as total'))
                ->where('aor', 'AOTR MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $customer_trend_revenue = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, (sum(scom_ach) + sum(snet_ach) + SUM(sphone_ach) + SUM(dxx_ach)) as total'))
                ->where('aor', 'AOTR MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $customer_trend_revenue = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, (sum(scom_ach) + sum(snet_ach) + SUM(sphone_ach) + SUM(dxx_ach)) as total'))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }


        $month = [];
        foreach ($customer_trend_revenue as $ct) {
            $month[$ct->month][$ct->unit] = $ct->total;
        }

//        dd($month);

        return view('layouts.master', compact('month', 'bts_tower_count', 'revenue_total', 'sphone_wc', 'snet_as', 'slots', 'customer_trend'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
