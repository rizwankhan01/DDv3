<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
    protected $table = "colors";
    protected $fillable = [
      'model_id',
      'name',
      'screen_color',
      'image'
    ];

    public function model(){
      return $this->belongsTo(models::class);
    }

    public function pricings(){
      return $this->hasOne(pricings::class,'color_id','id');
    }
}
