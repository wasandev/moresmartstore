<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


    Route::post('setup', 'UsersController@setup');
    Route::get('setup', 'UsersController@showSetup')->name('setup');




    Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');
    Route::get('determine-profile-route', 'ProfileController@determineProfileRoute')->name('determine-profile-route');
    Route::resource('profile', 'ProfileController');

    //setting
    Route::get('settings', 'SettingsController@settings')->name('settings');
    Route::post('settings', 'SettingsController@update')->name('user-update');

    //Route::get('services', 'ServiceController@index')->name('services');
    Route::get('pages/{slug}', array('as' => 'page.show', 'uses' => 'PagesController@show'));





