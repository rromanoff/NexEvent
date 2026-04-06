<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ParticipantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/event/{id}/participants', [ParticipantController::class, 'index']);
Route::post('/registration/{id}/verify', [ParticipantController::class, 'verifyAttendance']);