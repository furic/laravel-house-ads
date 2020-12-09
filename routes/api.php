<?php

use Illuminate\Support\Facades\Route;
use Furic\HouseAds\Http\Controllers\HouseAdController;

Route::resource('house-ads', HouseAdController::class)->only([
    'index', 'show', 'update'
]);