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

Route::group(['middleware' => ['auth','verified']],function () {


    Route::post('/comment','CommentController@store')->name('comment.store')->middleware('post');
    Route::post('/reply','CommentController@reply')->name('comment.reply')->middleware('post');
    Route::post('/vote','CommentController@vote')->name('comment.vote');

    Route::group(['middleware' => ['author']],function () {

        Route::get('/profile/{name}', 'ProfileController@authorIndex')->name('author.profile');
        Route::get('/profile/{name}/edit','ProfileController@authorEdit')->name('author.edit');
        Route::post('/profile/update','ProfileController@authorUpdate')->name('author.email');
        Route::post('/profile/update/password','ProfileController@passwordUpdate')->name('author.password');
        Route::get('/profile/{name}/edit/password','ProfileController@editPassword')->name('author.edit.password');

        Route::get('/post/create', 'PostController@create')->name('post.create');
        Route::post('/post/store', 'PostController@store')->name('post.store');
        Route::post('/image/upload','PostController@upload')->name('image');
    });

});


//Route::post('/comments/sort','CommentController@sort')->name('comments.sort');

Route::post('/newsletter','SubscriptionController@store')->name('subscription.store');

//Route::get('/html-email','NewsletterController@htmlEmail')->name('newsletter.html');

Route::post('/user-image/upload','ProfileController@uploadImage')->name('user.image');
Route::post('/user/update','ProfileController@update')->name('user.update');
Route::get('/comments/{slug}','CommentController@comments')->name('comments.all');
Route::get('/comments/{slug}/{type}','CommentController@sort')->name('comments.sort')->where('type','newest|liked|disliked');
Route::get('/tag/{tag}','TagController@show')->name('tag');

Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact/email', 'HomeController@contactEmail')->name('contact.email');

Route::get('/about', 'HomeController@about')->name('about');

Route::get('/author/{name}', 'HomeController@author')->name('author');

Route::get('/search', 'HomeController@search')->name('search');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@showLogin')->name('admin');
    Route::post('/login', 'AdminController@login')->name('admin.login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');

    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard')->middleware('auth.custom');;

    Route::get('/admins', 'AdminController@users')->name('admin.admins')->middleware('auth.custom');
    Route::get('/admins/add', 'AdminController@create')->name('admin.admins.create')->middleware('auth.custom');
    Route::post('/admins/add', 'AdminController@store')->name('admin.admins.store')->middleware('auth.custom');
    Route::get('/admins/edit/{id}', 'AdminController@edit')->name('admin.admins.edit')->middleware('auth.custom');
    Route::post('/admins/update/{id}', 'AdminController@update')->name('admin.admins.update')->middleware('auth.custom');
    Route::get('/admins/delete/{id}', 'AdminController@destroy')->name('admin.admins.delete')->middleware('auth.custom');


});




