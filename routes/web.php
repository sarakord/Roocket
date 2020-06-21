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


//route::get('panel','Admin\panelController@index');
route::namespace('Admin')->prefix('/admin')->group(function (){
    route::get('/panel','PanelController@index');
    route::resource('/articles','ArticleController');
    route::get('/article/{article}','ArticleController@status')->name('article.status');
    route::post('/panel/upload-image' , 'PanelController@uploadImageSubject');
    route::resource('/courses' ,'CourseController');
});





