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
use App\Http\Controllers\Blog\PostsController;
Route::get('/','WelcomeController@index')->name('blogs-home');
Route::get('/blog/post/{post}',[PostsController::class,'show'])->name('blog.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('categories','CategoriesController@index')->name('categories.index');

Route::resource('posts','PostsController');

Route::get('trashed-posts','PostsController@trashed')->name('trashed-posts.index');

Route::put('restore-post/{post}','PostsController@restore')->name('restore-posts');

Route::resource('tags','TagsController');

Route::middleware(['auth'])->group(function(){
    Route::post('categories/new','CategoriesController@store');
    Route::get('/categories/{category}/edit','CategoriesController@edit')->name('categories.edit');
    Route::get('categories/new','CategoriesController@create')->name('categories.create');
    Route::delete('/categories/delete/{id}','CategoriesController@destroy');
    Route::put('/categories/{category}/update','CategoriesController@update');

});

Route::middleware(['verify-admin'])->group(function(){
    Route::get('users','UsersController@index')->name('users.index');
    Route::patch('users/makeAdmin/{user}','UsersController@makeAdmin')->name('user.makeAdmin');
});



Route::get('users/edit','UsersController@edit')->name('users.edit-profile');
Route::patch('users/update','UsersController@update')->name('users.update');