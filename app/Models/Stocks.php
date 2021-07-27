<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stocks extends Model
{
  protected $table = "stocks";
  protected $fillable = [
    'model_id',
    'item_name',
    'dealer_id',
    'cost',
    'color',
    'quality',
    'tested',
    'posted_by',
    'store_name',
    'payment_status',
    'status',
  ];

  public function postedby(){
    return $this->belongsTo('App\User','posted_by');
  }

  public function dealer(){
    return $this->belongsTo(dealers::class, 'dealer_id');
  }

  public function model(){
    return $this->belongsTo(models::class);
  }
}
