<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_analytics extends Model
{
  protected $table = 'model_analytics';
  protected $fillable = [
    'url',
    'clicks',
    'impressions',
    'ctr',
    'position',
    'month'
  ];
}
