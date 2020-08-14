<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeBonus extends Model
{
    protected $fillable =['bonus','comm_paid_at','comm_paid_by'];
}
