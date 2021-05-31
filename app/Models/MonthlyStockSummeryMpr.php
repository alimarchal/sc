<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyStockSummeryMpr extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'btn', 'total', 'type_of_cards', 'denom', 'previous_balance_424_csc', 'previous_balance_428_csc', 'previous_balance_432_csc', 'received_during_month_424_csc', 'received_during_month_428_csc', 'received_during_month_432_csc', 'sold_unit_outlets_424_csc', 'sold_unit_outlets_428_csc', 'sold_unit_outlets_432_csc', 'sold_franchisee_jarral_mpr', 'sold_franchisee_kti', 'sold_franchisee_fahad_bhr', 'sold_franchisee_baig_krt', 'sold_franchisee_dadyal', 'bal_in_stores_424_csc', 'bal_in_stores_428_csc', 'bal_in_stores_432_csc',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
