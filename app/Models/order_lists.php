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

    public function color(){
      return $this->belongsTo(colors::class);
    }

    public function addon_product(){
      return $this->belongsTo(addon_products::class, 'color_id');
    }

    public function coupon(){
      return $this->belongsTo(coupons::class, 'color_id');
    }

    public function order(){
      return $this->belongsTo(orders::class);
    }
}
