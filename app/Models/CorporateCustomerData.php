<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateCustomerData extends Model
{
    use HasFactory;
    protected $fillable = ['btn_name','district','customer_name','revenue','package_offered','remarks',];
}
