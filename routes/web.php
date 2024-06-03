<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AuthenticateSessionController;
use App\Http\Controllers\RegisterUserController;

Route::get('/', function () { 
    return view('welcome');
});

// Routes for offers
Route::get('/offers', [OfferController::class, 'showAll']);
Route::get('/offers/id', [OfferController::class, 'showSelected']);
Route::post('/create', [OfferController::class, 'create']);

// Routes for users
Route::get('/login', [AuthenticateSessionController::class, 'login']);
Route::post('/signin', [RegisterUserController::class, 'signin']);
