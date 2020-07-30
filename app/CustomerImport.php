<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerImport extends Model
{
    protected $fillable = ['license', 'ext_id', 'api_id', 'reference_id', 'name', 'business_name', 'street', 'street2', 'city', 'zip', 'territory', 'phone', 'license_type','email', 'user_id', 'expiration'];
}
