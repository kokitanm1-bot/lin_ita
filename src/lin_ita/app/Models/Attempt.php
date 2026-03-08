<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $fillable = [
        'word_id',
        'quiz_type',
        'question',
        'correct_answer',
        'user_answer',
        'is_correct',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}