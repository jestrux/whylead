<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index');
Route::view('/consultancy', 'consultancy.index');
Route::view('/training', 'training.index');
