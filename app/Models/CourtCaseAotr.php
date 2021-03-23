<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class CourtCaseAotr extends Model
{
    use HasFactory;

    protected $fillable = ['district','case_pending_no','case_pending_amount','case_civs_suit_filed_no','case_civs_suit_filed_amount','case_pending_with_dues_no','case_pending_with_dues_amount','cases_req_written_off_no','cases_req_written_off_amount','case_pending_no_1','case_pending_amount_1','total_no','total_amount',];

    public function scopeStartsBetween($query, $date, $date2)
    {
        return $query->whereBetween('created_at', [$date, $date2]);
//        return $query->where('starts_at', '<=', Carbon::parse($date));
    }
}
