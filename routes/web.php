<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('/', 'GuestController@index')->name('index');

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'GuestController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@register');


// API Controller
Route::get('/api/videogames/list', 'ApiController@getVideogames')->name('api.videogames.list');
