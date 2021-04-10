<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCaseSec extends Model
{
    use HasFactory;
    protected $fillable = ['date','btn_name','region','name_of_tri','district','tehsil','main_ecxh','total_cases_regd_in_aor','outstanding_amount_against_regd_cases','amount_recovered_through_tri','cases_settled',];


    public function scopeStartsBetween($query, $date, $date2)
    {
        return $query->whereBetween('created_at', [$date, $date2]);
//        return $query->where('starts_at', '<=', Carbon::parse($date));
    }
}
