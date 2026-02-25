<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table = 'yorums';

    protected $fillable = [
        'ad',
        'mesaj',
        'onay'
    ];
}