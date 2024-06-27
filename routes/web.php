<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('index');
});

Route::resource('applications', ApplicationController::class);
