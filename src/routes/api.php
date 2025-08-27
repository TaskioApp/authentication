<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'login')->middleware('guest');
Route::post('register', 'register')->middleware('guest');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', 'logout');
    Route::get('me', 'me');
});
