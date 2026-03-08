<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
     protected $fillable = [
        'hero_title',
        'hero_description',
        'story_text1',
        'story_text2',
        'story_image',
        'mission',
        'vision'
    ];
}
