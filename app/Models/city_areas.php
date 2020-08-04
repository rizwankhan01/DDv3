<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class city_areas extends Model
{
    protected $table = "city_areas";
    protected $fillable = [
      'city',
      'area',
    ];
}
