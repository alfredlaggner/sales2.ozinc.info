<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenNinetyCommissionSalesOrder extends Model
{
    protected $fillable = ['is_comm_paid', 'comm_paid_at','saved_commissions_id'];

}
