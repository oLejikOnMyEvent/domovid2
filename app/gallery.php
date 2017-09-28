<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $table = 'gallery';
    //что разрешаем править
    protected $fillable = [
        'id', 'name', 'photo_url',
        ];
}
