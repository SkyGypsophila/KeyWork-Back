<?php

use App\Http\Controllers\API\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/offers', [OfferController::class, 'index'])->name('api.offers.index');
