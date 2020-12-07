<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enquiry extends Model
{
    protected $table = 'enquiries';
    protected $fillable = [
      'model_name',
      'customer_id',
      'city',
      'fdate',
      'status'
    ];

    public function customer(){
      return $this->belongsTo(customers::class);
    }
}
