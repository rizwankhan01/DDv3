<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table = "brands";
    protected $fillable = [
      'name',
      'brand_logo',
      'description',
      'meta_title',
      'meta_description',
    ];
}
