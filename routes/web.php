<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Add our new frontend dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/certificates', function () {
    return view('certificates.index');
});

Route::get('/certificates/create', function () {
    return view('certificates.create');
});