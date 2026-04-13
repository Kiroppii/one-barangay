<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\AuthController;

// PUBLIC ROUTE: Anyone can try to log in
Route::post('/login', [AuthController::class, 'login']);

// PROTECTED ROUTES: You MUST have a valid Sanctum token to access these
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/certificates', [CertificateController::class, 'index']);
    Route::post('/certificates', [CertificateController::class, 'store']);
    Route::put('/certificates/{id}/approve', [CertificateController::class, 'approve']);
    Route::get('/incidents', [App\Http\Controllers\Api\IncidentController::class, 'index']);
    Route::post('/incidents', [App\Http\Controllers\Api\IncidentController::class, 'store']);
    Route::get('/events', [App\Http\Controllers\Api\EventController::class, 'index']);
    Route::post('/events/register', [App\Http\Controllers\Api\EventController::class, 'register']);
    Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::get('/residents', [App\Http\Controllers\Api\ResidentController::class, 'index']);
    Route::get('/residents/{id}', [App\Http\Controllers\Api\ResidentController::class, 'show']);
});