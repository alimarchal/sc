<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyStockSummery extends Model
{
    use HasFactory;

    protected $fillable = ['btn','date','type_of_cards','denom','previous_balance_423_csc','previous_balance_426_csc','previous_balance_429_csc','received_during_month_423_csc','received_during_month_426_csc','received_during_month_429_csc','sold_unit_outlets_423_csc','sold_unit_outlets_426_csc','sold_unit_outlets_429_csc','sold_franchisee_mzd','sold_franchisee_bagh','sold_franchisee_rkt','bal_in_stores_423_csc','bal_in_stores_426_csc','bal_in_stores_429_csc','total',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
