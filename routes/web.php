<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebCertificateController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\WebDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\WebEventController;

// ==========================================
// 1. PUBLIC ROUTES (Anyone can access)
// ==========================================
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [WebAuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [WebAuthController::class, 'login'])
    ->middleware('guest');

Route::get('/register', [WebAuthController::class, 'showRegisterForm'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [WebAuthController::class, 'register'])
    ->middleware('guest');

Route::get('/admin/register', [WebAuthController::class, 'showAdminRegisterForm'])
    ->name('admin.register')
    ->middleware('guest');

Route::post('/admin/register', [WebAuthController::class, 'registerAdmin'])
    ->name('admin.register.store')
    ->middleware('guest');

Route::post('/logout', [WebAuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/logout', [WebAuthController::class, 'logout'])
    ->middleware('auth');

// ==========================================
// 2. PROTECTED ROUTES (Must be logged in to access)
// ==========================================
Route::middleware(['auth', 'no-back-history'])->group(function () {
    Route::get('/dashboard', [WebDashboardController::class, 'index'])
        ->name('dashboard');

    // Resident routes
    Route::get('/certificates', [WebCertificateController::class, 'index']);
    Route::get('/certificates/create', function () {
        return view('certificates.create');
    });
    Route::post('/certificates', [WebCertificateController::class, 'store']);

    Route::get('/incidents', function () {
        return view('incidents.index');
    });
    Route::get('/incidents/create', function () {
        return view('incidents.create');
    });

    Route::get('/events', [WebEventController::class, 'index']);
    Route::post('/events/{id}/register', [WebEventController::class, 'register']);

    // Admin routes
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/admin/certificates', [AdminCertificateController::class, 'index']);
    Route::get('/admin/certificates/{id}', [AdminCertificateController::class, 'show']);
    Route::post('/admin/certificates/{id}/approve', [AdminCertificateController::class, 'approve']);
    Route::post('/admin/certificates/{id}/reject', [AdminCertificateController::class, 'reject']);
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
});