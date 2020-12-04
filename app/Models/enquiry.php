<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enquiry extends Model
{
    protected $table = 'enquiries';
    protected $fillable = [
      'model_name',
      'customer_name',
      'phone_number',
      'city',
      'fdate',
      'status'
    ];
}
