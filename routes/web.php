<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebCertificateController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\WebDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\WebEventController;
use App\Http\Controllers\WebIncidentController;
use App\Http\Controllers\Admin\AdminIncidentController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminResidentController;
// ==========================================
// 1. PUBLIC ROUTES (Anyone can access)
// ==========================================
Route::get('/', function () {
    return redirect()->route('login');
});

// User Authentication
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

// Admin Authentication
Route::get('/admin/register', [WebAuthController::class, 'showAdminRegisterForm'])
    ->name('admin.register')
    ->middleware('guest');

Route::post('/admin/register', [WebAuthController::class, 'registerAdmin'])
    ->name('admin.register.store')
    ->middleware('guest');

// Logout (Supports both POST and GET to prevent errors)
Route::post('/logout', [WebAuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/logout', [WebAuthController::class, 'logout'])
    ->middleware('auth');


// ==========================================
// 2. PROTECTED ROUTES (Must be logged in to access)
// ==========================================
Route::middleware(['auth', 'no-back-history'])->group(function () {
    
    // --- Resident Routes ---
    Route::get('/dashboard', [WebDashboardController::class, 'index'])
        ->name('dashboard');
    
    // Certificates
    Route::get('/certificates', [WebCertificateController::class, 'index']);
    Route::get('/certificates/create', function () {
        return view('certificates.create');
    });
    Route::post('/certificates', [WebCertificateController::class, 'store']);
    
    // Incidents
    Route::get('/incidents', [WebIncidentController::class, 'index']);
    Route::get('/incidents/create', function () {
        return view('incidents.create');
    });
    Route::post('/incidents', [WebIncidentController::class, 'store']);

    // Events
    Route::get('/events', [WebEventController::class, 'index']);
    Route::post('/events/{id}/register', [WebEventController::class, 'register']);


    // --- Admin Routes ---
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    
    // Admin Certificates
    Route::get('/admin/certificates', [AdminCertificateController::class, 'index']);
    Route::get('/admin/certificates/{id}', [AdminCertificateController::class, 'show']);
    Route::post('/admin/certificates/{id}/approve', [AdminCertificateController::class, 'approve']);
    Route::post('/admin/certificates/{id}/reject', [AdminCertificateController::class, 'reject']);

    // Admin Incidents (Your requested routes are right here!)
    Route::get('/admin/incidents', [AdminIncidentController::class, 'index']);
    Route::get('/admin/incidents/{id}', [AdminIncidentController::class, 'show']);
    Route::post('/admin/incidents/{id}/investigate', [AdminIncidentController::class, 'investigate']);
    Route::post('/admin/incidents/{id}/resolve', [AdminIncidentController::class, 'resolve']);

    // Admin Events
     Route::get('/admin/events', [AdminEventController::class, 'index']);
     Route::get('/admin/events/{id}', [AdminEventController::class, 'show'])->name('admin.events.show');
     Route::post('/admin/events', [AdminEventController::class, 'store']);
    Route::post('/admin/events/register', [AdminEventController::class, 'registerResident']);
    Route::get('/admin/residents/search', [AdminEventController::class, 'searchResidents']);
    Route::get('/admin/residents', [AdminResidentController::class, 'index']);
    Route::get('/admin/residents/create', [AdminResidentController::class, 'create']);
    Route::post('/admin/residents', [AdminResidentController::class, 'store']);
});