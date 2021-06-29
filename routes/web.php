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

//Route::get('/', function () {
//    return view('index');
//});

Route::group(['middleware' => 'cek_login'], function(){
    
    /* ADMIN PAGE */
    
    Route::get('adminpage', 'PageController@adminpage');
    Route::get('profile', 'PageController@profile');
    Route::get('profile/edit', 'PageController@editProfile');
    Route::post('profile/update', 'PageController@updateProfile');
    Route::get('adminpage/dashboard', 'PageController@dashboard');

    Route::get('userdb', 'UserController@userdb');
    Route::get('contentdb', 'ContentController@contentdb');
    Route::get('commentdb', 'CommentController@commentdb');
    Route::get('premiumdb', 'PageController@premiumdb');
    Route::get('messagedb', 'MessageController@messagedb');

    Route::get('messagedb/{message}/delete', 'MessageController@delete');

    Route::get('userdb/{user}/delete', 'UserController@delete');
    Route::get('userdb/{user}/edit', 'UserController@edit');
    Route::post('userdb/{user}/update', 'UserController@update');
    Route::get('userdb/add_admin', 'UserController@add_admin');
    Route::post('userdb/add_admin/add', 'UserController@add');
    Route::get('userdb/{user}/downgrade', 'UserController@downgrade');

    Route::get('contentdb/{content}/delete', 'ContentController@delete');
    Route::get('contentdb/{content}', 'ContentController@detail');

    Route::get('premiumdb/{premium}/accept', 'PageController@accept');
    Route::get('premiumdb/{premium}/refuse', 'PageController@refuse');
    
    Route::get('commentdb/{comment}/delete', 'CommentController@delete');

    /* MEMBER PAGE */

    Route::get('memberpage', 'PageController@memberpage');
    Route::get('upload_video', 'ContentController@upload_video');
    Route::get('upload_photo', 'ContentController@upload_photo');
    Route::get('upload_story', 'ContentController@upload_story');
    Route::post('upload_video/upload1', 'ContentController@upload1');
    Route::post('upload_photo/upload2', 'ContentController@upload2');
    Route::post('upload_story/upload3', 'ContentController@upload3');

    Route::get('profile2', 'PageController@profile2');
    Route::get('profile2/edit', 'PageController@editProfile2');
    Route::post('profile2/update', 'PageController@updateProfile2');

    Route::get('message', 'MessageController@message');
    Route::post('message/store', 'MessageController@store');
    
    Route::get('memberpage/confirm', 'PageController@confirm');   
    
    Route::get('content', 'ContentController@content');
    Route::get('comment', 'CommentController@comment');

    Route::post('{content}/add_comment', 'CommentController@store');   
});

Route::get('login', 'LoginController@login');
Route::post('login/cek', 'LoginController@cek');
Route::get('logout', 'LoginController@logout');

Route::get('register', 'LoginController@register');
Route::post('login', 'LoginController@store');

Route::get('/', 'PageController@main');
Route::get('/videos', 'PageController@video');
Route::get('/photos', 'PageController@photo');
Route::get('/story', 'PageController@story');

Route::get('{content}', 'PageController@show');
