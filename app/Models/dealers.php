<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dealers extends Model
{
    protected $table = "dealers";
    protected $fillable = [
      'dealer_name',
      'phone_number',
      'address',
      'email'
    ];
}
