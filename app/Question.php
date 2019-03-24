<?php

namespace MiniSchool;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'video_id', 'question', 'answer', 
    ];

}
