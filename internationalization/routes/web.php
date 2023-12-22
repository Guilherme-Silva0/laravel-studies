<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    App::setLocale(session()->get('locale') ?? 'en');
    return view('welcome');
});

Route::get('/set_lang', function (Request $request) {

    $lang = $request->get('lang');

    if (! in_array($lang, ['en', 'pt_BR'])) {
        abort(400);
    }

    session()->put('locale', $lang);

    return redirect()->back();
})->name('set_lang');
