<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroProperties extends Model
{
    protected $fillable = [
        'keyLine',
        'title',
        'short_title',
        'image',
    ];
}
