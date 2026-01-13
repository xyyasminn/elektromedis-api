<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatWebController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES - ALAT ELEKTROMEDIS
|--------------------------------------------------------------------------
| Khusus tampilan web (UI)
| Tidak mengganggu API (Postman)
*/

Route::get('/alat', [AlatWebController::class, 'index']);
Route::get('/alat/create', [AlatWebController::class, 'create']);
Route::post('/alat', [AlatWebController::class, 'store']);
Route::get('/alat/{id}/edit', [AlatWebController::class, 'edit']);
Route::put('/alat/{id}', [AlatWebController::class, 'update']);
Route::delete('/alat/{id}', [AlatWebController::class, 'destroy']);
