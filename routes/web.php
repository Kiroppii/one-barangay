<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Add our new frontend dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
});