<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    protected $table = 'consultations';
    protected $fillable = [
        'order_id',
        'pcolor',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7'
    ];
}
