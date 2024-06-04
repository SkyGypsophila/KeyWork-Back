<?php

use App\Http\Controllers\API\AuthenticateSessionController;
use App\Http\Controllers\API\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthenticateSessionController::class, 'destroy'])->name('api.auth.destroy');

    Route::post('/offers/store', [OfferController::class, 'store'])->name('api.offer.store');

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});

Route::post('/login', [AuthenticateSessionController::class, 'store'])->name('api.auth.store');

Route::get('/offers', [OfferController::class, 'index'])->name('api.offers.index');
