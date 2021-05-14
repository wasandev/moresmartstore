<?php

use App\Blog;
use Illuminate\Support\Facades\Route;




//Auth::routes(['verify' => true]);
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
Route::get('pages', array('as' => 'page.about', 'uses' => 'PagesController@about'));


//vendors

Route::any('/vendors','VendorController@index');
Route::any('/vendors/type/{id}','VendorController@list');
Route::get('/vendors/{id}','VendorController@show');
//Route::get('send', 'VendorController@sendNotification');
//Posts
Route::any('/post','PostController@index');
Route::get('/post/{id}', 'PostController@show');
//Blogs
Route::any('/blogs', 'BlogController@index');

Route::get('/blogs/{slug}', 'BlogController@show');


//Products
Route::any('/products','ProductController@index');
Route::any('/products/category/{id}','ProductController@list');
Route::get('/products/{id}','ProductController@show');

//Messages

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('/unread', ['as' => 'messages.unread', 'uses' => 'MessagesController@unread']); // ajax + Pusher
    Route::get('/create/{id}/{subject}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    Route::get('/{id}/read', ['as' => 'messages.read', 'uses' => 'MessagesController@read']); // ajax + Pusher
});
