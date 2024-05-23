<?php

namespace App\Models;
use App\Models\OptionResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_type',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_answer',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function results()
    {
        return $this->belongsToMany(Result::class);
    }
}