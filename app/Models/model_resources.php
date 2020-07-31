<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_resources extends Model
{
    protected $table = "model_resources";
    protected $fillable = [
      'model_id',
      'screen_type',
      'screen_size',
      'screen_resolution',
      'screen_protection',
      'fix_type',
      'screen_fixtype',
      'release_date',
      'production_status',
      'tut_link',
      'buy_link',
      'phone_price',
      'display_type',
      'display_size',
      'display_resolution',
      'display_protection',
      'colors'
    ];
}
