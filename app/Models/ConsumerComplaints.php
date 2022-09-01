<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerComplaints extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'date', 'btn_name', 'fault', 'proven_svcs', 'qos', 'matter_related', 'misuse', 'value_added', 'non_proven', 'refund', 'verification', 'misleading', 'poor_customer', 'misc', 'total',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
