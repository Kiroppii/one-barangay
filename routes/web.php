<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\WebCertificateController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\WebDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\WebEventController;
use App\Http\Controllers\WebIncidentController;
use App\Http\Controllers\Admin\AdminIncidentController; // Added this import

// ==========================================
// 1. PUBLIC ROUTES (Anyone can access)
// ==========================================
Route::get('/', function () { 
    return view('auth.login'); 
});

// User Authentication
Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [WebAuthController::class, 'login'])->middleware('guest');

Route::get('/register', [WebAuthController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/register', [WebAuthController::class, 'register'])->middleware('guest');

// Admin Authentication
Route::get('/admin/register', [WebAuthController::class, 'showAdminRegisterForm'])->middleware('guest');
Route::post('/admin/register', [WebAuthController::class, 'registerAdmin'])->middleware('guest');

// Logout
Route::get('/logout', [WebAuthController::class, 'logout'])->name('logout');


// ==========================================
// 2. PROTECTED ROUTES (Must be logged in to access)
// ==========================================
Route::middleware(['auth', 'no-back-history'])->group(function () {
    
    // --- Resident Routes ---
    Route::get('/dashboard', [WebDashboardController::class, 'index']);
    
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
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
    
    // Admin Certificates
    Route::get('/admin/certificates', [AdminCertificateController::class, 'index']);
    Route::get('/admin/certificates/{id}', [AdminCertificateController::class, 'show']);
    Route::post('/admin/certificates/{id}/approve', [AdminCertificateController::class, 'approve']);
    Route::post('/admin/certificates/{id}/reject', [AdminCertificateController::class, 'reject']);

    // Admin Incidents
    Route::get('/admin/incidents', [AdminIncidentController::class, 'index']);
    Route::get('/admin/incidents/{id}', [AdminIncidentController::class, 'show']);
    Route::post('/admin/incidents/{id}/investigate', [AdminIncidentController::class, 'investigate']);
    Route::post('/admin/incidents/{id}/resolve', [AdminIncidentController::class, 'resolve']);

    // Admin UI Views (Placeholders until controllers are made)
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