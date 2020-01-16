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
Route::get('/categories/{category}', 'HomeController@category')->name('category');
Route::get('/author', 'HomeController@author')->name('author');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/profile', 'ProfileController@index')->name('profile');

