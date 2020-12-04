<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
      'order_id',
      'issue',
      'resolution',
      'date_open',
      'date_close',
      'assigned_to',
      'status'
    ];

    public function order(){
      return $this->belongsTo(orders::class);
    }

    public function serviceman(){
      return $this->belongsTo('App\User','assigned_to');
    }
}
