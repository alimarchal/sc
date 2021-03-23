<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceCenter extends Model
{
    use HasFactory;
    protected $fillable = ['loc_of_csc','svsc','inquiry','complaint','ntc','acct_closure','bill_payment','payment_detail_receipt','duplicate_bill','card_purchases','misc','total',];
}
