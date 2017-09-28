<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testgal extends Model
{
    protected $table = 'testgal';
    //что разрешаем править
    protected $fillable = [
        'name', 'var', 'value', 'description','image',
    ];
}
