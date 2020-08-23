<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
/**
 * Class News
 * @mixin Eloquent
 */
class Payment extends Model
{
    protected $fillable = [
        'comm_percent',
        'commission',
        'comm_paid_at',
        'comm_paid_by',
        'is_ten_ninety',
        'half',
        '1099_calendar_id'
    ];
}
