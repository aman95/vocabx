<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meaning extends Model
{
    protected $fillable = [
        'word',
        'meaning',
        'image',
    ];
}
