<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activitys extends Model
{
    protected $table = "activitys";
    protected $fillable = [
      'model_id',
      'color_id',
      'customer_id'
    ];
}
