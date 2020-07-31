<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    protected $table = "addresses";
    protected $fillable = [
      'customer_id',
      'address_type',
      'address',
      'area',
      'city',
      'pincode',
      'gps_location',
      'pass',
    ];
}
