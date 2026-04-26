<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController; // This connects to your login logic!
use App\Http\Controllers\WebCertificateController;
// ==========================================
// 1. PUBLIC ROUTES (Anyone can access)
// ==========================================
Route::get('/', function () { 
    return view('auth.login'); 
});

// Login UI and Form Submission
Route::get('/login', function () { 
    return view('auth.login'); 
})->name('login'); // Laravel needs this name for redirects!

Route::post('/login', [WebAuthController::class, 'login']);

// Registration UI and Form Submission
Route::get('/register', function () { 
    return view('auth.register'); 
});
Route::post('/register', [WebAuthController::class, 'register']);

// Logout Route
Route::get('/logout', [WebAuthController::class, 'logout']);


// ==========================================
// 2. PROTECTED ROUTES (Must be logged in to access)
// ==========================================
Route::middleware('auth')->group(function () {
    
    // --- Resident Routes ---
    Route::get('/dashboard', function () { 
        return view('dashboard'); 
    });
    
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

    // --- Admin Routes ---
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

});