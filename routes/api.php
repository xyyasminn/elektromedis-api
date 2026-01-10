<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatElektromedisController;

Route::apiResource(
    'alat-elektromedis',
    AlatElektromedisController::class
);
