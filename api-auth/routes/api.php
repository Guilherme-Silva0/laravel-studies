<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});
