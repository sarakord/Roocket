<?php

namespace App\Http\Controllers;

use App\Course;
use App\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    public function single(Course $course)
    {
        $course->increment('viewCount');

//        Redis::incr("views.{$course->id}.courses");
        $comments = $course->comments()->where('approved' , 1)->where('parent_id', 0)->latest()->with('comments')->get();
        return view('Home.courses' , compact('course' , 'comments'));
    }

    public function download(Episode $episode)
    {
        $hash = 'fds@#T@#56@sdgs131fasfq' . $episode->id . \request()->ip() . \request('t');

        if(Hash::check($hash , \request('mac'))) {
            return response()->download(storage_path($episode->videoUrl));
        } else {
            return 'لینک دانلود شما از کار افتاده است';
        }


    }
}
