<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function () {
    route::get('login', 'LoginController@showLoginForm')->name('login');
    route::post('login', 'LoginController@login');
    route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('login/google', 'LoginController@redirectToProvider');
    Route::get('login/google/callback', 'LoginController@handleProviderCallback');

    route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    route::post('register', 'RegisterController@register');

    route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

route::namespace('Admin')->middleware(['auth', 'checkAdmin'])->prefix('/admin')->group(function () {
    route::get('/panel', 'PanelController@index');
    route::resource('/articles', 'ArticleController');
    route::get('/article/{article}', 'ArticleController@status')->name('article.status');
    route::post('/panel/upload-image', 'PanelController@uploadImageSubject');
    route::resource('/courses', 'CourseController');
    route::resource('/episodes', 'EpisodeController');
    route::resource('/roles', 'RoleController');
    route::resource('/permissions', 'PermissionController');
    route::get('/comments/unsuccessful', 'CommentController@unsuccessful')->name('comments.unsuccssful');
    route::resource('/comments', 'CommentController');
    route::get('/payments/unsuccessful', 'PaymentController@unsuccessful')->name('payments.unsuccessful');
    route::resource('/payments', 'PaymentController');

    route::group(['prefix' => 'users'], function () {
        route::get('/', 'UserController@index');
        route::get('/destroy/{user}', 'UserController@destroy')->name('user.destroy');
        route::resource('level', 'LevelManageController', ['parameters' => ['level' => 'user']]);
    });
});

Route::middleware(['auth','web'])->group(function (){
    Route::post('course/payment', 'PaymentController@payment')->name('course.payment');
    Route::get('course/payment/checker', 'PaymentController@checker')->name('callback');
});

Route::get('/', 'HomeController@index');

Route::get('/articles', 'ArticleController@index');
Route::get('/article/{article}', 'ArticleController@single')->name('article.single');

Route::get('/courses', 'CourseController@index');
Route::get('/course/{course}', 'CourseController@single')->name('course.single');

Route::post('/comment', 'HomeController@comment');
Route::get('/user/active/email/{token}', 'UserController@activation')->name('activation.account');

Route::get('sitemap', 'SitemapController@index');
Route::get('sitemap-articles', 'SitemapController@articles');
Route::get('feed/articles', 'FeedController@articles');

Route::get('/home', 'HomeController@index')->name('home');
