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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('categories/new','CategoriesController@create')->name('categories.create')->middleware('auth');
Route::post('categories/new','CategoriesController@store')->middleware('auth');
Route::delete('/categories/delete/{id}','CategoriesController@destroy')->middleware('auth');
Route::put('/categories/{category}/update','CategoriesController@update')->middleware('auth');
Route::get('/categories/{category}/edit','CategoriesController@edit')->middleware('auth')->name('categories.edit');
Route::get('categories','CategoriesController@index')->name('categories.index');

Route::resource('posts','PostsController');

Route::get('trashed-posts','PostsController@trashed')->name('trashed-posts.index');

Route::put('restore-post/{post}','PostsController@restore')->name('restore-posts');
