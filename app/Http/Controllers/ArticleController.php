<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function single(Article $article)
    {
        $article->increment('viewCount');
        $comments = $article->comments()->where('approved' , 1)->where('parent_id', 0)->latest()->with(['comments' => function($query) {
            $query->where('approved' , 1)->latest();
        }])->get();

//        return $comments;
//        Redis::incr("views.{$article->id}.articles");
        return view('Home.article' , compact('article' , 'comments'));
    }
}
