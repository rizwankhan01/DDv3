<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_analytics extends Model
{
  protected $table = 'model_analytics';
  protected $fillable = [
    'url',
    'clicks',
    'impressions',
    'ctr',
    'position',
    'month'
  ];

  public function orders(){
    return $this->hasMany(order_lists::class,'url','color_id')
                ->where('prod_type','!=','ADDON')
                ->where('prod_type','!=','COUPON');
  }

  public function models(){
    return $this->belongsTo(models::class);
  }

}
