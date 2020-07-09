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

Route::get('/user/active/email/{token}' , 'UserController@activation')->name('activation.account');

route::namespace('Admin')->middleware(['auth','checkAdmin'])->prefix('/admin')->group(function () {
    route::get('/panel', 'PanelController@index');
    route::resource('/articles', 'ArticleController');
    route::get('/article/{article}', 'ArticleController@status')->name('article.status');
    route::post('/panel/upload-image', 'PanelController@uploadImageSubject');
    route::resource('/courses', 'CourseController');
    route::resource('/episodes', 'EpisodeController');
    route::resource('/roles', 'RoleController');
    route::resource('/permissions', 'PermissionController');

    route::group(['prefix'=>'users'], function () {
        route::get('/', 'UserController@index');
        route::get('/destroy/{user}', 'UserController@destroy')->name('user.destroy');
        route::resource('level', 'LevelManageController' , ['parameters'=>['level'=>'user']]);
    });
});

Route::get('/', function () {
   /* return auth()->loginUsingId(1);*/
    //event(new \App\Events\UserActivation(\App\User::find(1)));
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
