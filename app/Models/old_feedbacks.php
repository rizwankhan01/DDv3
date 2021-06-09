<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class old_feedbacks extends Model
{
  protected $table  = "old_feedbacks";
  protected $fillable = [
    'brand_id',
    'model_id',
    'customer_id',
    'feedback'
  ];

  public function brand(){
    return $this->belongsTo(brands::class, 'brand_id');
  }

  public function model(){
    return $this->belongsTo(models::class, 'model_id');
  }

  public function customer(){
    return $this->belongsTo(customers::class, 'customer_id');
  }
}
