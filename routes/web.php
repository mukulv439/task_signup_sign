<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

Route::get('/chart', [ChartController::class, 'userActiveTime']);
Route::get('/user', [ChartController::class, 'index'])->name('users');;