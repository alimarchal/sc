<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class CourtCaseAotr extends Model
{
    use HasFactory;

    protected $fillable = ['date','region','particulars','district','case_pending_no','case_pending_amount','case_civs_suit_filed_no','case_civs_suit_filed_amount','case_pending_with_dues_no','case_pending_with_dues_amount','cases_req_written_off_no','cases_req_written_off_amount','case_pending_no_1','case_pending_amount_1','total_no','total_amount',];

    public function scopeMonth(Builder $query, $date): Builder
    {
        return $query->whereMonth('date', '=', Carbon::parse($date)->format('m'))->whereYear('date', '=', Carbon::parse($date)->format('Y'));
    }
}
