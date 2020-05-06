<?php

use Illuminate\Support\Facades\Route;




Auth::routes(['verify' => true]);

//Welcome page : home
Route::get('/','MstoreController@index');
//Pages
Route::get('pages/{slug}', array('as' => 'page.show', 'uses' => 'PagesController@show'));

//Posts
Route::get('/post','PostController@index');
Route::get('/post/{slug}', 'PostController@show');
//Blogs
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@show');






