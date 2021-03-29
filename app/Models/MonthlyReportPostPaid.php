<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyReportPostPaid extends Model
{
    use HasFactory;

    protected $fillable = ['btn_name','district','client_name','no_of_connections','remarks',];
}
