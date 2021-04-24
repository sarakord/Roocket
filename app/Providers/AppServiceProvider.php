<?php

namespace App\Providers;


use App\Comment;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('Admin.section.header', function ($view) {
            $unsuccessfulCount = Comment::where('approved', 0)->count();
            $successfulCount = Comment::where('approved', 1)->count();
            $view->with([
                'commentUnsuccessfulCount' => $unsuccessfulCount,
                'commentSuccessfulCount' => $successfulCount,
            ]);
        });
    }
}
