<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimsSale extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'type', 'btn_name', 'name', 're_verified_sims', 'duplicate_sims', 'new_sims', 'total',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('created_at', '=', Carbon::parse($date)->format('m'))->whereYear('created_at', '=', Carbon::parse($date)->format('Y'));
    }
}
