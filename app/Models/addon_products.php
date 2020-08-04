<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addon_products extends Model
{
    protected $table = "addon_products";
    protected $fillable = [
      'name',
      'cost',
      'description',
      'price',
      'image'
    ];
    
}
