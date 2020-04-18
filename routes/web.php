<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

 Route::post('register', 'Auth\RegisterController@register');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::post('login', 'Auth\LoginController@login');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Auth::routes(['verify' => true]);


    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

    Route::post('setup', 'UsersController@setup');
    Route::get('setup', 'UsersController@showSetup')->name('setup');

    Route::get('home', 'HomeController@index')->name('home');


    Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');
    Route::get('determine-profile-route', 'ProfileController@determineProfileRoute')->name('determine-profile-route');
    Route::resource('profile', 'ProfileController');

    //setting
    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('settings', 'SettingsController@update')->name('user-update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
