<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoRevenueCollectionAotr extends Model
{
    use HasFactory;

    protected $fillable = ['date','aor','detail','amount_trf_sco_main_acc','remarks','month_date'];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('month_date', '=', Carbon::parse($date)->format('m'))->whereYear('month_date', '=', Carbon::parse($date)->format('Y'));
    }
}
