<?php

namespace MiniSchool;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'title', 'link', 'link_id', 'descreption'
    ];
}
