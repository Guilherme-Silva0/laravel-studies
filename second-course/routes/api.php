<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);

Route::middleware(["auth:sanctum"])->group(function () {
    Route::apiResource('/supports', SupportController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/replies/{supportId}', [ReplySupportApiController::class, 'index']);
    Route::post('/replies/{supportId}', [ReplySupportApiController::class, 'store'])->name('replies.store');
    Route::delete('/supports/{id}/replies/{reply}', [ReplySupportApiController::class, 'destroy'])->name('replies.destroy');
});
