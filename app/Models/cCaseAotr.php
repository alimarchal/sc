<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cCaseAotr extends Model
{
    use HasFactory;

    protected $fillable = ['years','aor','case_suited','settled','bal','defaulted_amount','recovered_amount','amount_balance','month_date'];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('month_date', '=', Carbon::parse($date)->format('m'))->whereYear('month_date', '=', Carbon::parse($date)->format('Y'));
    }
}
