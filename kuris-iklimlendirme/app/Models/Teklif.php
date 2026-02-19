<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teklif extends Model
{
    protected $fillable = [
    'name',
    'phone',
    'email',
    'city',
    'service',
    'place_type',
    'square_meter',
    'note',
    'calculated_price',
];
}
