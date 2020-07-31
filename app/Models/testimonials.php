<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    protected $table = "testimonials";
    protected $fillable = [
      'customer_id',
      'model_id',
      'testimonial',
      'rating'
    ];
}
