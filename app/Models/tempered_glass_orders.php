<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tempered_glass_orders extends Model
{
    public $table = "tempered_glass_orders";

    public $fillable = [
        'model_id',
        'name',
        'phone_number',
        'address',
        'city',
        'status'
    ];

    public function model() {
        return $this->belongsTo(models::class);
    }
}
