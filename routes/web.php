<?php

use App\Http\Controllers\BabController;
use App\Http\Controllers\SubbabController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BabController::class, 'index'])
    ->name('index');
Route::get('/bab/{slug}', [BabController::class, 'show'])
    ->name('bab/slug');
Route::get('/subbab/{slug}', [SubbabController::class, 'show'])
    ->name('subbab/{slug}');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/menu', [BabController::class, 'menu'])->name('menu');