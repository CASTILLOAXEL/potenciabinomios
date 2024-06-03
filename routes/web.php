<?php

use App\Http\Controllers\BinomialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BinomialController::class, 'showForm']);
Route::post('/calculate', [BinomialController::class, 'calculate']);
