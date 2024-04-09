<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index');
Route::view('/consultancy', 'consultancy.index');
Route::view('/training', 'training.index');
Route::view('/about', 'about.index');
Route::view('/contacts', 'contacts');
Route::view('/podcast', 'podcast.index');
