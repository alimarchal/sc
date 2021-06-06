<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FortnightlyReportCdma extends Model
{
    use HasFactory;

    protected $fillable = ['date','aor','previous_hh','previous_dt','fortnightly_hh','fortnightly_dt','total_hh','total_dt',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
