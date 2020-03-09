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



Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/single', 'HomeController@single')->name('single');

Route::get('/{category}', 'HomeController@category')->name('category');
Route::get('/{category}/{slug}', 'PostController@show')->name('post');
Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('/post/store', 'PostController@store')->name('post.store')->middleware('auth');
Route::post('/image/upload','PostController@upload')->name('image')->middleware('auth');
Route::get('/tag/{tag}','TagController@show')->name('tag');
Route::post('/comment','CommentController@store')->name('comment.store')->middleware('post','auth');
Route::post('/reply','CommentController@reply')->name('comment.reply')->middleware('post','auth');
Route::post('/vote','CommentController@vote')->name('comment.vote')->middleware('auth');
Route::get('/comments/{slug}','CommentController@comments')->name('comments.all');
Route::get('/comments/{slug}/{type}','CommentController@sort')->name('comments.sort')->where('type','newest|liked|disliked');



//Route::post('/comments/sort','CommentController@sort')->name('comments.sort');

Route::post('/newsletter','SubscriptionController@store')->name('subscription.store');

//Route::get('/html-email','NewsletterController@htmlEmail')->name('newsletter.html');


Route::post('/user-image/upload','ProfileController@uploadImage')->name('user.image');
Route::post('/user/update','ProfileController@update')->name('user.update');
Route::get('/author/{name}', 'HomeController@author')->name('author');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::POST('/search', 'HomeController@search')->name('search');

Route::get('/profile', 'ProfileController@index')->name('profile');


