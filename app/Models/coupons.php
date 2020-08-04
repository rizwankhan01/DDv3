<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coupons extends Model
{
    protected $table = "coupons";
    protected $fillable = [
      'name',
      'validity',
      'amount',
      'status'
    ];
}
