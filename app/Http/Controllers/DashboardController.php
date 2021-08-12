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

        $sphone_max_date = null;
        $snet_max_date = null;
        $rev_max_date = null;

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
            $max_date = Carbon::create(RevenueTarget::max('date'));
            $rev_max_date = RevenueTarget::max('date');
            $revenue_sum = RevenueTarget::where('aor', 'AOTR MZD')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get();
//            $revenue_sum = RevenueTarget::where('aor', 'AOTR MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $max_date = Carbon::create(RevenueTarget::max('date'));
            $rev_max_date = RevenueTarget::max('date');
            $revenue_sum = RevenueTarget::where('aor', 'AOTR MPR')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get();
//            $revenue_sum = RevenueTarget::where('aor', 'AOTR MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $max_date = Carbon::create(RevenueTarget::max('date'));
            $rev_max_date = RevenueTarget::max('date');
            $revenue_sum = RevenueTarget::whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get();
//            $revenue_sum = RevenueTarget::whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        }


        $revenue_sum_mpr = RevenueTarget::where('aor', 'AOTR MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now()->subMonth())->format('Y'))->get();
        $revenue_sum_mzd = RevenueTarget::where('aor', 'AOTR MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now()->subMonth())->format('Y'))->get();


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
            $max_date = Carbon::create(Sphone::max('date'));
            $sphone_max_date = Sphone::max('date');
            $sphone_wc = Sphone::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get('wc')->sum('wc');
//            $sphone_wc = Sphone::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $max_date = Carbon::create(Sphone::max('date'));
            $sphone_max_date = Sphone::max('date');
            $sphone_wc = Sphone::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get('wc')->sum('wc');
//            $sphone_wc = Sphone::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $max_date = Carbon::create(Sphone::max('date'));
            $sphone_max_date = Sphone::max('date');
            $sphone_wc = Sphone::whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get('wc')->sum('wc');
//            $sphone_wc = Sphone::whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('wc')->sum('wc');
        }

        $snet_as = null;

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $max_date = Carbon::create(Snet::max('date'));
            $snet_max_date = Snet::max('date');
//            $snet_as = Snet::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');
            $snet_as = Snet::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get('active_subscriber')->sum('active_subscriber');
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $max_date = Carbon::create(Snet::max('date'));
            $snet_max_date = Snet::max('date');
//            $snet_as = Snet::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');
            $snet_as = Snet::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get('active_subscriber')->sum('active_subscriber');
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $max_date = Carbon::create(Snet::max('date'));
            $snet_max_date = Snet::max('date');
//            $snet_as = Snet::whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get('active_subscriber')->sum('active_subscriber');
            $snet_as = Snet::whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get('active_subscriber')->sum('active_subscriber');
        }

        $sphone = null;

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {

            $max_date = Carbon::create(Sphone::max('date'));
            $sphone_max_date = Sphone::max('date');
            $sphone = Sphone::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get();
//            $sphone = Sphone::where('btn', '61 CSB MZD')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $max_date = Carbon::create(Sphone::max('date'));
            $sphone_max_date = Sphone::max('date');
            $sphone = Sphone::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get();
//            $sphone = Sphone::where('btn', '64 CSB MPR')->whereMonth('date', '=', Carbon::parse(Carbon::now()->subMonth()->endOfMonth())->format('m'))->whereYear('date', '=', Carbon::parse(Carbon::now())->format('Y'))->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $max_date = Carbon::create(Sphone::max('date'));
            $sphone_max_date = Sphone::max('date');
//            DB::enableQueryLog();
            $sphone = Sphone::whereMonth('date', '=', Carbon::parse($max_date)->format('m'))->whereYear('date', '=', Carbon::parse($max_date)->format('Y'))->get();

//            dd(DB::getQueryLog());
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


        $customer_trnd = null;
        foreach ($customer_trend as $ct) {
            $customer_trnd[$ct->month]['pmc'] = 0;
            $customer_trnd[$ct->month]['ntc'] = 0;
        }

        foreach ($customer_trend as $ct) {
            $customer_trnd[$ct->month]['ntc'] = $ct->ntc;
        }
        foreach ($customer_trend as $ct) {
            $customer_trnd[$ct->month]['pmc'] = $ct->pmc;
        }
//        dd($customer_trnd);


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
            $month[$ct->month]['AOTR MZD'] = 0;
            $month[$ct->month]['AOTR MPR'] = 0;
        }

        foreach ($customer_trend_revenue as $ct) {
            $month[$ct->month][$ct->unit] = $ct->total;
        }


        //sphone avtive subscriber

        $sphone_active_subscriber = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $sphone_active_subscriber = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(sphone_wc) as total'))
                ->where('btn', '61 CSB MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(4))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $sphone_active_subscriber = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(sphone_wc) as total'))
                ->where('btn', '64 CSB MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(4))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $sphone_active_subscriber = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(sphone_wc) as total'))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(4))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }

        $month2 = [];
        foreach ($sphone_active_subscriber as $ct) {
            $month2[$ct->month]['64 CSB MPR'] = 0;
            $month2[$ct->month]['61 CSB MZD'] = 0;
        }
        foreach ($sphone_active_subscriber as $ct) {
            $month2[$ct->month][$ct->unit] = $ct->total;
        }


        $dsl_connections = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $dsl_connections = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(dsl_active_subscriber) as total'))
                ->where('btn', '61 CSB MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(4))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $dsl_connections = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(dsl_active_subscriber) as total'))
                ->where('btn', '64 CSB MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(4))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $dsl_connections = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(dsl_active_subscriber) as total'))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(4))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }


        $month3 = [];
        foreach ($dsl_connections as $ct) {
            $month3[$ct->month]['64 CSB MPR'] = 0;
            $month3[$ct->month]['61 CSB MZD'] = 0;
        }
        foreach ($dsl_connections as $ct) {
            $month3[$ct->month][$ct->unit] = $ct->total;
        }


        $monthly_network_status_gsm = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $monthly_network_status_gsm = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(gsm_sim_sold_till_date) as total'))
                ->where('btn', '61 CSB MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $monthly_network_status_gsm = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(gsm_sim_sold_till_date) as total'))
                ->where('btn', '64 CSB MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $monthly_network_status_gsm = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(gsm_sim_sold_till_date) as total'))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }


        $month4 = [];
        foreach ($monthly_network_status_gsm as $ct) {
            $month4[$ct->month]['64 CSB MPR'] = 0;
            $month4[$ct->month]['61 CSB MZD'] = 0;
        }
        foreach ($monthly_network_status_gsm as $ct) {
            $month4[$ct->month][$ct->unit] = $ct->total;
        }


        $gsm_sim_sold_during_month = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $gsm_sim_sold_during_month = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(gsm_sim_sold_during_month) as total'))
                ->where('btn', '61 CSB MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $gsm_sim_sold_during_month = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(gsm_sim_sold_during_month) as total'))
                ->where('btn', '64 CSB MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $gsm_sim_sold_during_month = DB::table('monthly_network_statuses')
                ->select(DB::raw('btn as unit, MONTHNAME(date) as month, sum(gsm_sim_sold_during_month) as total'))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }


//        dd($gsm_sim_sold_during_month);
        $month5 = [];
        foreach ($gsm_sim_sold_during_month as $ct) {
            $month5[$ct->month]['64 CSB MPR'] = 0;
            $month5[$ct->month]['61 CSB MZD'] = 0;
        }
        foreach ($gsm_sim_sold_during_month as $ct) {
            $month5[$ct->month][$ct->unit] = $ct->total;
        }


        $sco_achinve = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $sco_achinve = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, sum(scom_ach) as total'))
                ->where('aor', 'AOTR MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {

            $sco_achinve = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, sum(scom_ach) as total'))
                ->where('aor', 'AOTR MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();

        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $sco_achinve = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, sum(scom_ach) as total'))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(5))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }


        $month6 = [];
        foreach ($sco_achinve as $ct) {
            $month6[$ct->month]['AOTR MZD'] = 0;
            $month6[$ct->month]['AOTR MPR'] = 0;
        }
        foreach ($sco_achinve as $ct) {
            $month6[$ct->month][$ct->unit] = $ct->total;
        }


        //
        $consumer_ach_ach = null;

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $consumer_ach_ach = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, sum(scom_asg) as gsm_asg, sum(scom_ach) as gsm_ach, sum(sphone_asg) as pstn_asg, sum(sphone_ach) as pstn_ach, sum(snet_asg) as dsl_asg, sum(snet_ach) as dsl_ach, sum(dxx_asg) as dxx_asg, sum(dxx_ach) as dxx_ach '))
                ->where('aor', 'AOTR MZD')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $consumer_ach_ach = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, sum(scom_asg) as gsm_asg, sum(scom_ach) as gsm_ach, sum(sphone_asg) as pstn_asg, sum(sphone_ach) as pstn_ach, sum(snet_asg) as dsl_asg, sum(snet_ach) as dsl_ach, sum(dxx_asg) as dxx_asg, sum(dxx_ach) as dxx_ach '))
                ->where('aor', 'AOTR MPR')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $consumer_ach_ach = DB::table('revenue_targets')
                ->select(DB::raw('aor as unit, MONTHNAME(date) as month, sum(scom_asg) as gsm_asg, sum(scom_ach) as gsm_ach, sum(sphone_asg) as pstn_asg, sum(sphone_ach) as pstn_ach, sum(snet_asg) as dsl_asg, sum(snet_ach) as dsl_ach, sum(dxx_asg) as dxx_asg, sum(dxx_ach) as dxx_ach '))
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('aor, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }

        $consumer_ach = [];
        foreach ($consumer_ach_ach as $ct) {
            $consumer_ach[$ct->month]['AOTR MZD']['gsm_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['gsm_ach'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['pstn_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['pstn_ach'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['dsl_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['dsl_ach'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['dxx_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MZD']['dxx_ach'] = 0;


            $consumer_ach[$ct->month]['AOTR MPR']['gsm_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['gsm_ach'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['pstn_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['pstn_ach'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['dsl_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['dsl_ach'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['dxx_asg'] = 0;
            $consumer_ach[$ct->month]['AOTR MPR']['dxx_ach'] = 0;
        }
//
        foreach ($consumer_ach_ach as $ct) {
            $consumer_ach[$ct->month][$ct->unit]['gsm_asg'] = $ct->gsm_asg;
            $consumer_ach[$ct->month][$ct->unit]['gsm_ach'] = $ct->gsm_ach;
            $consumer_ach[$ct->month][$ct->unit]['pstn_asg'] = $ct->pstn_asg;
            $consumer_ach[$ct->month][$ct->unit]['pstn_ach'] = $ct->pstn_ach;
            $consumer_ach[$ct->month][$ct->unit]['dsl_asg'] = $ct->dsl_asg;
            $consumer_ach[$ct->month][$ct->unit]['dsl_ach'] = $ct->dsl_ach;
            $consumer_ach[$ct->month][$ct->unit]['dxx_asg'] = $ct->dxx_asg;
            $consumer_ach[$ct->month][$ct->unit]['dxx_ach'] = $ct->dxx_ach;
        }



        $com_sphone = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $com_sphone = DB::table('consumer_complaints')
                ->select(DB::raw('type as sphone, btn_name as unit, MONTHNAME(date) as month, sum(total) as total'))
                ->where('btn_name', '61 CSB MZD')
                ->where('type', 'Basic Telephony')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn_name, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $com_sphone = DB::table('consumer_complaints')
                ->select(DB::raw('type as sphone, btn_name as unit, MONTHNAME(date) as month, sum(total) as total'))
                ->where('btn_name', '64 CSB MPR')
                ->where('type', 'Basic Telephony')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn_name, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $com_sphone = DB::table('consumer_complaints')
                ->select(DB::raw('type as sphone, btn_name as unit, MONTHNAME(date) as month, sum(total) as total'))
                ->where('type', 'Basic Telephony')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn_name, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }

        $month8 = [];
        foreach ($com_sphone as $ct) {
            $month8[$ct->month]['61 CSB MZD'] = 0;
            $month8[$ct->month]['64 CSB MPR'] = 0;
        }
        foreach ($com_sphone as $ct) {
            $month8[$ct->month][$ct->unit] = $ct->total;
        }



        $com_snet = null;
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD") {
            $com_snet = DB::table('consumer_complaints')
                ->select(DB::raw('type as sphone, btn_name as unit, MONTHNAME(date) as month, sum(total) as total'))
                ->where('btn_name', '61 CSB MZD')
                ->where('type', 'SNET')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn_name, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR") {
            $com_snet = DB::table('consumer_complaints')
                ->select(DB::raw('type as sphone, btn_name as unit, MONTHNAME(date) as month, sum(total) as total'))
                ->where('btn_name', '64 CSB MPR')
                ->where('type', 'SNET')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn_name, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        } elseif (auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin") {
            $com_snet = DB::table('consumer_complaints')
                ->select(DB::raw('type, btn_name as unit, MONTHNAME(date) as month, sum(total) as total'))
                ->where('type', 'SNET')
                ->whereBetween('date', [Carbon::parse(Carbon::now()->subMonth(6))->startOfMonth()->toDateString(), Carbon::parse(now())->endOfMonth()->toDateString()])
                ->groupBy(DB::raw('btn_name, YEAR(date), MONTH(date)'))
                ->orderBy('unit', 'desc')->orderBy('date', 'asc')
                ->get();
        }

        $month9 = [];
        foreach ($com_snet as $ct) {
            $month9[$ct->month]['61 CSB MZD'] = 0;
            $month9[$ct->month]['64 CSB MPR'] = 0;
        }
        foreach ($com_snet as $ct) {
            $month9[$ct->month][$ct->unit] = $ct->total;
        }


//        dd($month8);
        return view('layouts.master', compact('customer_trnd', 'consumer_ach', 'month', 'month2', 'month3', 'month4', 'month5', 'month6','month8', 'month9', 'sphone_max_date', 'snet_max_date', 'rev_max_date', 'bts_tower_count', 'revenue_total', 'sphone_wc', 'snet_as', 'slots', 'customer_trend'));
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
