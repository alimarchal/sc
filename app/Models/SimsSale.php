<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimsSale extends Model
{
    use HasFactory;

    protected $fillable = ['type','btn_name','name','re_verified_sims','duplicate_sims','new_sims','total',];
}
