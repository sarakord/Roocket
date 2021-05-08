<?php

namespace App\Providers;


use App\Comment;
use App\Payment;
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
            $commentUnsuccessfulCount = Comment::where('approved', 0)->count();
            $commentSuccessfulCount = Comment::where('approved', 1)->count();

            $paymentUnsuccessfulCount = Payment::where('payment', 0)->count();
            $paymentSuccessfulCount = Payment::where('payment', 1)->count();

            $view->with([
                'commentUnsuccessfulCount' => $commentUnsuccessfulCount,
                'commentSuccessfulCount' => $commentSuccessfulCount,
                'paymentUnsuccessfulCount' => $paymentUnsuccessfulCount,
                'paymentSuccessfulCount' => $paymentSuccessfulCount,
            ]);
        });
    }
}
