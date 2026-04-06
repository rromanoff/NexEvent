<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register-event', [RegistrationController::class, 'register']);
Route::post('/cancel-event', [RegistrationController::class, 'cancelRegistration']);
Route::get('/events', [EventController::class, 'index']);
