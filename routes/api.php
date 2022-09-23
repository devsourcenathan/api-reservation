<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Products route
Route::get('/bookings', [BookingController::class, 'index']);

Route::get('/books/{param}', [BookingController::class, 'find']);



Route::post('/bookings', [BookingController::class, 'store']);

