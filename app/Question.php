<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'type',
        'statement',
        'level',
        'category_id',
        'answer_id',
    ];

    public function answer() {
        return $this->belongsTo(Answer::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
