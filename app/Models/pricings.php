<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pricings extends Model
{
    protected $table = "pricings";
    protected $fillable = [
      'color_id',
      'ord_selling_price',
      'original_selling_price',
      'preferred_type',
      'ord_stock_availablity',
      'org_stock_availablity',
      'ord_compare_description',
      'org_compare desciption'
    ];
}
