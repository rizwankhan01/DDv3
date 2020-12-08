<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
      'slot_time',
      'slot_date',
      'customer_id',
      'address_id',
      'status',
      'serviceman_id',
      'dealer_id',
      'stock_price',
      'reschedule_reason',
      'cancel_reason',
      'pickup_reason'
    ];
    public function customer(){
      return $this->belongsTo(customers::class, 'customer_id');
    }

    public function address(){
      return $this->belongsTo(addresses::class,'address_id');
    }

    public function serviceman(){
      return $this->belongsTo('App\User','serviceman_id');
    }

    public function dealer(){
      return $this->belongsTo(dealers::class,'dealer_id');
    }

    public function order_list(){
      return $this->belongsTo(order_lists::class,'id');
    }

    public function closedorder(){
      return $this->hasOne(closedorder::class ,'order_id','id');
    }

}
