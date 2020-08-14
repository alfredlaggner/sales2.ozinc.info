<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['comm_percent', 'commission','comm_paid_at','comm_paid_by'];
}
