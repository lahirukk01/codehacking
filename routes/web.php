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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/{id}', 'AdminPostController@post')->name('home.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::resource('/admin/users', 'AdminUserController');

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/admin/users', 'AdminUserController');
    Route::resource('/admin/posts', 'AdminPostController');
    Route::resource('/admin/categories', 'AdminCategoryController');
    Route::resource('/admin/media', 'AdminMediaController');

    Route::resource('/admin/comments', 'PostCommentController');
    Route::resource('/admin/comments/replies', 'CommentReplyController');
});



Route::get('/admin', function () {
    return view('admin.index');
});


Route::group(['middleware' => 'auth'], function () {

    Route::post('/comment/reply', 'CommentReplyController@storeReply');

});