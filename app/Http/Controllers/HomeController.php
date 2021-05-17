<?php

namespace App\Http\Controllers;

use App\Article;
use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lang = app()->getLocale();
        if (cache()->has("article.$lang")) {
            $articles = cache("article.$lang");
        } else {
            $articles = Article::where('lang', $lang)->latest()->take(12)->get();
        }

        if (cache()->has("course.$lang")) {
            $courses = cache("course.$lang");
        } else {
            $courses = Course::where('lang', $lang)->latest()->take(4)->get();
        }

        return view('Home.index', ['articles' => $articles, 'courses' => $courses]);
    }

    public
    function comment()
    {
        $this->validate(request(), [
            'comment' => 'required|min:5'
        ]);

        auth()->user()->comments()->create(\request()->all());
        return back();
    }
}
