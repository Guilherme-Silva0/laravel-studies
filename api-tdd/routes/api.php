<?php

use App\Http\Controllers\API\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{bookId}', [BookController::class, 'show'])->name('books.show');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::match(['put', 'patch'], '/books/{bookId}', [BookController::class, 'update'])->name('books.update');
