<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('index');
});

Route::get('/analytics', function () {
    return view('analytics');
});

Route::get('/applications/search', [ApplicationController::class, 'search']);
Route::resource('applications', ApplicationController::class);