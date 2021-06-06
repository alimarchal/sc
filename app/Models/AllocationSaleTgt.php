<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllocationSaleTgt extends Model
{
    use HasFactory;

    protected $fillable = ['date','btn','will_cards_tgt_neelum','will_connection_achived_neelum','will_cards_tgt_atb','will_connection_achived_atb','will_cards_tgt_rcgp','will_connection_rcgp','will_cards_tgt_total','will_connection_rcgp_total',];
}
