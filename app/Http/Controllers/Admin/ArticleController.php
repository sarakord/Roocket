<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends AdminController
{

    public function index()
    {
//        return User::create([
//            'name'=>'ali',
//            'email'=>'ali@yahoo.com',
//            'password' => bcrypt(123456)
//        ]);
        $articles = Article::latest()->paginate(5);
        return view('Admin.articles.all', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        $imagesUrl = $this->uploadImages($request->file('images'));
        auth()->user()->articles()->create(array_merge($request->all(), ['images' => $imagesUrl]));

        return redirect(route('articles.index'));
        /*auth()->loginUsingId(1);
        $validatDate = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'description'=>'required',
            'tags'=>'required',
        ]);
        $imageUrl=$this->UploadeImages($request->file('images'));
        auth()->user()->articles()->create(array_merge($validatDate , ['images'=>$imageUrl]));
        return  redirect(route('articles.index'));*/
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('Admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {


        $article = Article::find($id);
       /* $url1=$article->images['images']['300'];
        //$url = Storage::disk($url1)->getAdapter()->getPathPrefix();

        return $url1;*/
        $file = $request->file('images');
        $inputs = $request->all();

        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
            /*$files =$article->images;
            File::delete( ''.$files);*/

        } else {
            $inputs['images'] = $article->images;
            $inputs['images']['thumb']=$inputs['imagesThumb'];
        }
        unset($inputs['imagesThumb']);
        $article->update($inputs);

        return redirect(route('articles.index'));
    }


    public function status($id)
    {
        $article = Article::find($id);
        if ($article->status == 1) {
            $article->status = 0;
        } else {
            $article->status = 1;
        }
        $article->save();
        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return back();
    }
}
