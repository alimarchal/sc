<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlySaleProgressMpr extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'btn', 'services', 'denom', 'card_sale_through_own_outlets_424_csc', 'card_sale_through_own_outlets_428_csc', 'card_sale_through_own_outlets_432_csc', 'sales_card', 'own_outlet_total_cards', 'own_outlet_total_revenue', 'card_sale_through_franchise_jarral_mpr', 'card_sale_through_franchise_kti', 'card_sale_through_franchise_fahad_bhr', 'card_sale_through_franchise_baig_krt', 'card_sale_through_franchise_dadyal', 'franchisee_total_cards', 'franchisee_total_revenue', 'own_outlet_franchisee_total_cards', 'own_outlet_franchisee_total_revenue',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
