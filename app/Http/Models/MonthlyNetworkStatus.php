<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyNetworkStatus extends Model
{
    use HasFactory;

    protected $fillable = ['date','btn','company','sphone_total_exc','sphone_wc','sphone_pmc','sphone_ntc','sphone_fds','gsm_total_bts','gsm_sys_cap','gsm_sim_sold_till_date','gsm_total_subscriber','gsm_active_subscriber','gsm_average_vlr_subs','gsm_sim_sold_during_month','dsl_total_dsl_sites','dsl_cap','dsl_active_subscriber','dsl_provided_during_the_month','dxx_total_dss_sites','dxx_cap','dxx_active_subs','dxx_provided_during_the_month',];
    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
