<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'statement',
        'level',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
