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

Route::get('/nama/{namaorang?}', function ($namaorang = 'Hamba Allah'){
		return 'Nama : ' . $namaorang;
});

Route::middleware(['auth'])->group(function () {
    Route::get('/post', 'BlogController@index')->name('post.index');
    Route::get('/post/{id}/show', 'BlogController@show')->name('post.show');
    Route::get('/post/create', 'BlogController@create')->name('post.create');
    Route::post('/post/store', 'BlogController@store')->name('post.store');
    Route::get('/post/{id}/edit', 'BlogController@edit')->name('post.edit');
    Route::patch('/post/{id}/update', 'BlogController@update')->name('post.update');
    Route::delete('/post/{id}/destroy', 'BlogController@destroy')->name('post.destroy');
    Route::get('/trash', 'BlogController@trash')->name('post.trash');
    Route::get('/restore/{id}', 'BlogController@restore')->name('post.restore');
    Route::get('/forcedelete/{id}', 'BlogController@forcedelete')->name('post.forcedelete');
    Route::get('/search', 'BlogController@search')->name('post.search');
});

Route::get('/member', function () {
    return 'Halaman Member';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
