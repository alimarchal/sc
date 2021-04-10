<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceCenter extends Model
{
    use HasFactory;
    protected $fillable = ['date','region','loc_of_csc','svsc','inquiry','complaint','ntc','acct_closure','bill_payment','payment_detail_receipt','duplicate_bill','card_purchases','misc','total',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('created_at', '=', Carbon::parse($date)->format('m'))->whereYear('created_at', '=', Carbon::parse($date)->format('Y'));
    }
}
