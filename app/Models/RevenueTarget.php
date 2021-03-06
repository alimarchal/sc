<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueTarget extends Model
{
    use HasFactory;

    protected $fillable = ['date','aor','scom_asg','remarks','scom_ach','snet_asg','snet_ach','sphone_asg','sphone_ach','dxx_asg','dxx_ach','total_ach','total_asg','gpon_asg', 'gpon_ach'
    ];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }

}
