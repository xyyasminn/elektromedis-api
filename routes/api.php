<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatElektromedisController;

Route::get('/alat-elektromedis', [AlatElektromedisController::class, 'index']);

// 🔥 SEARCH HARUS DI ATAS ROUTE {id}
Route::get('/alat-elektromedis/search', [AlatElektromedisController::class, 'search']);

Route::get('/alat-elektromedis/{id}', [AlatElektromedisController::class, 'show']);

Route::post('/alat-elektromedis', [AlatElektromedisController::class, 'store']);
Route::put('/alat-elektromedis/{id}', [AlatElektromedisController::class, 'update']);
Route::delete('/alat-elektromedis/{id}', [AlatElektromedisController::class, 'destroy']);