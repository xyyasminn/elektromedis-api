<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatWebController;

Route::get('/', function () {
    return redirect('/alat');
});

Route::resource('alat', AlatWebController::class);
