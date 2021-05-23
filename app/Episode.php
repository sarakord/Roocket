<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Episode extends Model
{
    protected $fillable = ['course_id', 'type', 'title', 'description', 'videoUrl', 'tags', 'time', 'number'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function path()
    {
        return "/courses/{$this->course->slug}/episode/{$this->number}" ;
    }

    public function download()
    {
        if (! auth()->check()) return '#';
    }

}
