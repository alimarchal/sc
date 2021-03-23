<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCaseSec extends Model
{
    use HasFactory;
    protected $fillable = ['name_of_tri','district','tehsil','main_ecxh','total_cases_regd_in_aor','outstanding_amount_against_regd_cases','amount_recovered_through_tri','cases_settled',];
}
