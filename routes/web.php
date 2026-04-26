<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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

Route::get('/incidents', function () {
    return view('incidents.index');
});

Route::get('/incidents/create', function () {
    return view('incidents.create');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/certificates', function () {
    return view('admin.certificates.index');
});

Route::get('/admin/incidents', function () {
    return view('admin.incidents.index');
}); 

Route::get('/admin/events', function () {
    return view('admin.events.index');
});

Route::get('/admin/residents', function () {
    return view('admin.residents.index');
});

Route::get('/admin/residents/create', function () {
    return view('admin.residents.create');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});