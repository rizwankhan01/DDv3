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
      'status'
    ];
    public function customer(){
      return $this->belongsTo(customers::class, 'customer_id');
    }
}
