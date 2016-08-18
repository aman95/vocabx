<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'type',
        'isCompleted',
        'level',
        'category_id',
        'uri',
        'questions',
        'answers',
        'points',
    ];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
