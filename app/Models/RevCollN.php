<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevCollN extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'aor', 'type_of_card', 'value_of_card', 'card_sold_unit_outlets', 'card_sold_franchisee', 'card_sold_total', 'rebate_percentage', 'rebate_amount_in_rs', 'adv_tax_percentage', 'adv_tax_amount_in_rs', 'bal_amount_rs_unit_outlets', 'bal_amount_franchisee', 'bal_amount_total',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
