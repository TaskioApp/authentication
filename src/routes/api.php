<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'login');
Route::post('verify', 'verify');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', 'logout');
    Route::get('me', 'me');
});
