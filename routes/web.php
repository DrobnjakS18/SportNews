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
        Route::get('/profile/{name}/post/destroy/{id}', 'ProfileController@authorPostDestroy')->name('author.post.destroy');

        Route::get('/post/create', 'PostController@create')->name('post.create');
        Route::post('/post/store', 'PostController@store')->name('post.store');
        Route::get('/post/{slug}/edit', 'PostController@edit')->name('post.edit');
        Route::post('/post/update', 'PostController@update')->name('post.update');

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

    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard')->middleware('auth.custom');
    Route::post('/images/upload', 'PostController@upload')->name('images.upload')->middleware('auth.custom');

    Route::get('/admins', 'AdminController@users')->name('admin.admins')->middleware('auth.custom');
    Route::get('/admins/add', 'AdminController@create')->name('admin.admins.create')->middleware('auth.custom');
    Route::post('/admins/add', 'AdminController@store')->name('admin.admins.store')->middleware('auth.custom');
    Route::get('/admins/edit/{id}', 'AdminController@edit')->name('admin.admins.edit')->middleware('auth.custom');
    Route::post('/admins/update/{id}', 'AdminController@update')->name('admin.admins.update')->middleware('auth.custom');
    Route::get('/admins/delete/{id}', 'AdminController@destroy')->name('admin.admins.delete')->middleware('auth.custom');

    Route::get('/users', 'UserController@index')->name('users.users')->middleware('auth.custom');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('auth.custom');
    Route::post('/users', 'UserController@store')->name('users.store')->middleware('auth.custom');
    Route::post('/user/role', 'UserController@changeRole')->name('users.role')->middleware('auth.custom');
//    Route::get('/admins/edit/{id}', 'AdminController@edit')->name('admin.admins.edit')->middleware('auth.custom');
//    Route::post('/admins/update/{id}', 'AdminController@update')->name('admin.admins.update')->middleware('auth.custom');
    Route::get('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy')->middleware('auth.custom');

    Route::get('/posts', 'PostController@adminIndex')->name('admin.post.index')->middleware('auth.custom');
    Route::get('/posts/unverified', 'PostController@unverified')->name('admin.post.unverified')->middleware('auth.custom');
    Route::get('/posts/verified', 'PostController@verified')->name('admin.post.verified')->middleware('auth.custom');
    Route::post('/posts/verify', 'PostController@verify')->name('admin.post.verify')->middleware('auth.custom');
    Route::post('/posts/select', 'PostController@select')->name('admin.post.select')->middleware('auth.custom');
    Route::get('/posts/selected', 'PostController@selected')->name('admin.post.selected')->middleware('auth.custom');
    Route::get('/posts/{id}', 'PostController@adminShow')->name('admin.post.show')->middleware('auth.custom');
    Route::get('/posts/destroy/{id}', 'PostController@destroy')->name('admin.post.destroy')->middleware('auth.custom');

    Route::get('/comments', 'CommentController@adminIndex')->name('admin.comment.index')->middleware('auth.custom');
    Route::get('/comments/unverified', 'CommentController@unverified')->name('admin.comment.unverified')->middleware('auth.custom');
    Route::get('/comments/verified', 'CommentController@verified')->name('admin.comment.verified')->middleware('auth.custom');
    Route::post('/comments/verify', 'CommentController@verify')->name('admin.comment.verify')->middleware('auth.custom');
    Route::get('/comments/destroy/{id}', 'CommentController@destroy')->name('admin.comment.destroy')->middleware('auth.custom');

    Route::get('/answers', 'CommentController@adminIndex')->name('admin.answer.index')->middleware('auth.custom');
    Route::get('/answers/unverified', 'CommentController@unverified')->name('admin.answer.unverified')->middleware('auth.custom');
    Route::get('/answers/verified', 'CommentController@verified')->name('admin.answer.verified')->middleware('auth.custom');
    Route::post('/answers/verify', 'CommentController@verify')->name('admin.answer.verify')->middleware('auth.custom');
    Route::get('/answers/destroy/{id}', 'CommentController@destroyAnswer')->name('admin.answer.destroy')->middleware('auth.custom');
});




