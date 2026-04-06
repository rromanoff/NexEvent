<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ParticipantController;
use App\Http\Controllers\Web\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/event/{id}/participants', [ParticipantController::class, 'index']);
Route::post('/registration/{id}/verify', [ParticipantController::class, 'verifyAttendance']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}/edit', [EventController::class, 'edit']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);