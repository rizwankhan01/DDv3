<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    protected $table  = "models";
    protected $fillable = [
      'brand_id',
      'series',
      'name',
      'description',
      'meta_title',
      'meta_description',
      'image',
      'additional_image'
    ];

    public function brand(){
      return $this->belongsTo(brands::class);
    }
}
