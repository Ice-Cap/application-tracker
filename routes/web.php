<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AnalyticsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/analytics', [AnalyticsController::class, 'index']);

Route::get('/applications/search', [ApplicationController::class, 'search']);
Route::resource('applications', ApplicationController::class);