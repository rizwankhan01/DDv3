<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class closedorder extends Model
{
    protected $table  = "closedorders";
    protected $fillable = [
      'order_id',
      'pre_image',
      'post_image',
      'imei',
      'payment_type',
      'notes',
      'start_timestamp',
      'end_timestamp',
      'start_lat',
      'start_lng',
      'end_lat',
      'end_lng',
      'distance',
      'rate1',
      'rate2',
      'rate3',
      'rate4',
      'rate5',
      'rate6',
      'rate7',
      'rate8',
      'rate9',
      'feedback',
      'company_name',
      'company_gst',
      'company_address'
    ];
}
