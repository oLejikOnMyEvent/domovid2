<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = 'supplier';
    //что разрешаем править
    protected $fillable = [
        'url', 'image_sup',
    ];
}