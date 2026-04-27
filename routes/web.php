<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController; // This connects to your login logic!
use App\Http\Controllers\WebCertificateController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\WebDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\WebEventController;
// ==========================================
// 1. PUBLIC ROUTES (Anyone can access)
// ==========================================
Route::get('/', function () { 
    return view('auth.login'); 
});

Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [WebAuthController::class, 'login'])->middleware('guest');
Route::get('/register', [WebAuthController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/register', [WebAuthController::class, 'register'])->middleware('guest');

// Login UI and Form Submission
Route::get('/login', [WebAuthController::class, 'showLoginForm'])->name('login')->middleware('guest'); // Laravel needs this name for redirects!

Route::post('/login', [WebAuthController::class, 'login']);

// Registration UI and Form Submission
Route::get('/register', function () { 
    return view('auth.register'); 
});

Route::get('/admin/register', [WebAuthController::class, 'showAdminRegisterForm'])->middleware('guest');
Route::post('/admin/register', [WebAuthController::class, 'registerAdmin'])->middleware('guest');

Route::post('/register', [WebAuthController::class, 'register']);

// Logout Route

Route::get('/logout', [WebAuthController::class, 'logout'])->name('logout');

 Route::get('/admin/register', [WebAuthController::class, 'showAdminRegisterForm'])->middleware('guest');
Route::post('/admin/register', [WebAuthController::class, 'registerAdmin'])->middleware('guest');


// ==========================================
// 2. PROTECTED ROUTES (Must be logged in to access)
// ==========================================
Route::middleware(['auth', 'no-back-history'])->group(function () {
    
    Route::get('/dashboard', [WebDashboardController::class, 'index']);
    // --- Resident Routes ---
   Route::get('/dashboard', [WebDashboardController::class, 'index']);
    
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

    Route::get('/events', [\App\Http\Controllers\WebEventController::class, 'index']);
         // ADD THIS LINE
    Route::post('/events/{id}/register', [\App\Http\Controllers\WebEventController::class, 'register']);

    Route::post('/events/{id}/register', [WebEventController::class, 'register']);

    // --- Admin Routes ---
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
    
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