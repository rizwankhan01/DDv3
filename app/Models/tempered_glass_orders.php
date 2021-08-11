<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tempered_glass_orders extends Model
{
    public $table = "tempered_glass_orders";

    public $fillable = [
        'model_id', //model name
        'name',
        'phone_number',
        'address',
        'city',
        'status'
        //referer
    ];

    public function model() {
        return $this->belongsTo(models::class);
    }
}
