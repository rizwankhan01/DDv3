<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    protected $table = 'expenses';
    protected $fillable = [
      'reason',
      'expenses',
      'postedby',
    ];

    public function user(){
      return $this->belongsTo('App\User','postedby');
    }
}
