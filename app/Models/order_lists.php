<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_lists extends Model
{
    protected $table = "order_lists";
    protected $fillable = [
      'order_id',
      'color_id',
      'price',
      'prod_type'
    ];
}
