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
        'correct_answer',
        'option1',
        'option2',
        'option3',
    ];

//    public function answer() {
//        return $this->belongsTo(Answer::class);
//    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
