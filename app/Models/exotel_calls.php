<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exotel_calls extends Model
{
    protected $table = 'exotel_calls';
    protected $fillable = [
      'customer_phone',
      'call_result',
    ];
}
