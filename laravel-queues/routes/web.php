<?php

use App\Jobs\MyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/attack', function (Request $request) {
    dispatch(new MyJob('Foi detectado uma tentativa de ataque brute force', $request->ip()))
        ->delay(now()->addSeconds(5));

    return redirect()->route('home');
})->name('attack');
