<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateCustomerData extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'btn_name', 'district', 'customer_name', 'revenue', 'package_offered', 'remarks',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('created_at', '=', Carbon::parse($date)->format('m'))->whereYear('created_at', '=', Carbon::parse($date)->format('Y'));
    }
}
