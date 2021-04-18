<?php

namespace App\Http\Controllers;

use App\Article;
use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(12)->get();
        $courses = Course::latest()->take(4)->get();

        return view('Home.index',['articles'=>$articles , 'courses'=>$courses]);
    }

    public function comment()
    {
        $this->validate(request(),[
            'comment' => 'required|min:5'
        ]);

        auth()->user()->comments()->create(\request()->all());
        return back();
    }
}
