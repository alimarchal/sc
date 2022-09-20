<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftth extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'btn',
        'company',
        'total_accts',
        'new_accs',
        'pmc',
        'restored_after_pmc',
    ];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
