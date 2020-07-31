<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = "customers";
    protected $fillable = [
      'name',
      'phone_number',
      'add_phone_number',
      'email',
      'add_email',
      'work',
      'ga_id',
      'image'
    ];
}
