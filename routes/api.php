<?php

use App\Http\Controllers\API\AuthenticateSessionController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterUserController;

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthenticateSessionController::class, 'destroy'])->name('api.auth.destroy');

    Route::post('/offers/store', [OfferController::class, 'store'])->name('api.offer.store');

    Route::get('/user/profile', [ProfileController::class, 'index'])->name('api.user-profile.index');

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});

Route::post('/register', [RegisterUserController::class, 'store']);

Route::post('/login', [AuthenticateSessionController::class, 'store'])->name('api.auth.store');

Route::get('/offers', [OfferController::class, 'index'])->name('api.offers.index');
