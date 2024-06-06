<?php

use App\Http\Controllers\BabController;
use App\Http\Controllers\SubbabController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BabController::class, 'index']);
Route::get('/bab/{slug}', [BabController::class, 'show']);
Route::get('/subbab/{slug}', [SubbabController::class, 'show']);
