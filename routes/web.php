<?php

use App\Blog;
use Illuminate\Support\Facades\Route;




//Auth::routes(['verify' => true]);
Auth::routes();
//Welcome page : /
Route::get('/','MstoreController@index');

//Memeber page : /
Route::get('/home','HomeController@index');
//Pages
Route::get('pages/{slug}', array('as' => 'page.show', 'uses' => 'PagesController@show'));

//vendors

Route::any('/vendors','VendorController@index');
Route::any('/vendors/type/{id}','VendorController@list');
Route::get('/vendors/{id}','VendorController@show');
//Posts
// Route::any('/post','PostController@index');
// Route::get('/post/{slug}', 'PostController@show');
//Blogs
Route::any('/blogs', 'BlogController@index');

Route::get('/blogs/{slug}', 'BlogController@show');


//Products
Route::any('/products','ProductController@index');
Route::any('/products/category/{id}','ProductController@list');
Route::get('/products/{id}','ProductController@show');

