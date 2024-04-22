<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/series', SeriesController::class)->except('show');
