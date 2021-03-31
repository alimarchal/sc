<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseWiseRevenue extends Model
{
    use HasFactory;

    protected $fillable = ['name_of_franchise','aor_district','asg','ach','month',];
}
