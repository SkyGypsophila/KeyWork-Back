<?php

use App\Http\Controllers\API\AuthenticateSessionController;
use App\Http\Controllers\API\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthenticateSessionController::class, 'store'])->name('api.auth.store');
Route::post('/logout', [AuthenticateSessionController::class, 'destroy'])->middleware('auth:sanctum')->name('api.auth.destroy');

Route::get('/offers', [OfferController::class, 'index'])->name('api.offers.index');
