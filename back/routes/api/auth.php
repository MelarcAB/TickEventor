<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//authcontroller
use App\Http\Controllers\Auth\AuthController;


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/register', 'register')-> name('auth.register');
});