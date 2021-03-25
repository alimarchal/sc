<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumerComplaints extends Model
{
    use HasFactory;

    protected $fillable = ['type','btn_name','fault','proven_svcs','qos','matter_related','misuse','value_added','non_proven','refund','verification','misleading','poor_customer','misc','total',];
}
