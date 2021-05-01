<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlySaleProgress extends Model
{
    use HasFactory;

    protected $fillable = ['date','btn','services','denom','card_sale_through_own_outlets_423_csc','card_sale_through_own_outlets_426_csc','card_sale_through_own_outlets_429_csc','own_outlet_total_cards','own_outlet_total_revenue','card_sale_through_franchise_neelum_comm_mzd','card_sale_through_franchise_ahmed_trader_bagh','card_sale_through_franchise_rkt_comm_gp','franchisee_total_cards','franchisee_total_revenue','own_outlet_franchisee_total_cards','own_outlet_franchisee_total_revenue',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
