<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteState extends Model
{
    use HasFactory;

    protected $fillable = ['type','btn_name','site_name','total_monthly_revenue','total_number_of_hour_site_switched_off','month',];
}
