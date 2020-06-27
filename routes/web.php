<?php

use App\Blog;
use Illuminate\Support\Facades\Route;




Auth::routes(['verify' => true]);
//Auth::routes();
//Welcome page : /
Route::get('/','MstoreController@index');

//Memeber page : /
Route::get('/home','HomeController@index');
Route::get('/notifications', 'HomeController@notifications');
Route::get('/profile/{id}','HomeController@profile');
Route::post('followUserRequest', 'HomeController@followUserRequest')->name('followuserRequest');


//Route::post('/profile/{id}/follow', 'HomeController@follow')->name('follow');
//Route::delete('profile/{id}/unfollow', 'HomeController@unfollow')->name('unfollow');
//Pages
Route::get('pages/{slug}', array('as' => 'page.show', 'uses' => 'PagesController@show'));

//vendors

Route::any('/vendors','VendorController@index');
Route::any('/vendors/type/{id}','VendorController@list');
Route::get('/vendors/{id}','VendorController@show');
//Route::get('send', 'VendorController@sendNotification');
//Posts
Route::any('/post','PostController@index');
Route::get('/post/{slug}', 'PostController@show');
//Blogs
Route::any('/blogs', 'BlogController@index');

Route::get('/blogs/{slug}', 'BlogController@show');


//Products
Route::any('/products','ProductController@index');
Route::any('/products/category/{id}','ProductController@list');
Route::get('/products/{id}','ProductController@show');

//Notification

//Route::view('/notification', 'notifies/notification');
