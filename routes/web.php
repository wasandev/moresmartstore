<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

// Route::post('register', 'Auth\RegisterController@register');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('login', 'Auth\LoginController@login');
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//     Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//     Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

    Route::post('setup', 'UsersController@setup');
    Route::get('setup', 'UsersController@showSetup')->name('setup');

    Route::get('home', 'HomeController@index')->name('home');


    Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');
    Route::get('determine-profile-route', 'ProfileController@determineProfileRoute')->name('determine-profile-route');
    Route::resource('profile', 'ProfileController');

    //setting
    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('settings', 'SettingsController@update')->name('user-update');

    //Route::get('services', 'ServiceController@index')->name('services');
    Route::get('about','PagesController@about')->name('about');
    Route::get('contact','PagesController@contact')->name('contact');
    Route::get('privacy','PagesController@privacy')->name('privacy');
    Route::get('terms','PagesController@terms')->name('terms');




