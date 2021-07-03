<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpseclib\Crypt\Hash;

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
        $status = false;
        switch ($this->type) {
            case 'free' :
                $status = true;
                break;
            case 'vip' :
                if(user()->isActive()) $status = true;
                break;
            case 'cash' :
                if(user()->checkLearning($this->course)) $status = true;
                break;
        }
        $timestamp = Carbon::now()->addHours(5)->timestamp;
        $hash = Hash::make('fds@#T@#56@sdgs131fasfq' . $this->id . request()->ip() . $timestamp);

        return $status ? "/download/$this->id?mac=$hash&t=$timestamp" : "#";
    }

}
