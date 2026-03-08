<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    'hero_title',
    'hero_desc',
    'address',
    'phone',
    'email',
    'facebook',
    'instagram',
    'video',
    'map_embed'
];
}
