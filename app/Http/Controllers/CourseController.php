<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function single(Course $course)
    {
        $course->increment('viewCount');

//        Redis::incr("views.{$course->id}.courses");
        $comments = $course->comments()->where('approved' , 1)->where('parent_id', 0)->latest()->with('comments')->get();
        return view('Home.courses' , compact('course' , 'comments'));
    }
}
