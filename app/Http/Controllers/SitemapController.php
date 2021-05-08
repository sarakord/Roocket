<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap', 60);

        if(! $sitemap->isCached() ) {
            $sitemap->addSitemap(url()->to('/sitemap-articles'));
        }

        return $sitemap->render('sitemapindex');
    }

    public function articles()
    {
        $sitemap = app()->make('sitemap');
        $sitemap->setCache('laravel.sitemap.articles', 60);

        if(! $sitemap->isCached() ) {
            $articles = Article::latest()->get();
            foreach ($articles as $article) {
                $sitemap->add(url()->to($article->path()),$article->created_at ,'0.9','Weekly');
            }
        }

        return $sitemap->render();
    }
}
