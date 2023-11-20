<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*

 Rotas simples

// Route::get('/empresa', function () {
//     return view('empresa');
// });

Route::view('/empresa', 'empresa');

Route::any('/any', function () {
    return 'Qualquer tipo de requisição';
});

Route::match(['get', 'post'], '/match', function () {
    return 'Permite apenas requisições definidas';
});

Route::get('/produto/{id}/{cat}', function ($id, $cat) {
    return "Id do produto: {$id} <br> Categoria: {$cat}";
});

// Route::get('/sobre', function () {
//     return redirect('/empresa');
// });

Route::redirect('/sobre', '/empresa');

Route::get('/news', function () {
    return view('news');
})->name('noticias');

Route::get('/novidades', function () {
    return redirect()->route('noticias');
});

*/

/**
 * Grupos de rotas
 */

/*
Route::get('/', function () {
   return redirect()->route('admin.dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'],function () {
   Route::get('dashboard', function () {
       return "Dashboard";
   })->name('dashboard');

   Route::get('users', function () {
       return "Users";
   })->name('users');

   Route::get('products', function () {
       return "Products";
   })->name('products');
});
*/

/**
 * Controladores
 */

/*
Route::get('/', [ProdutoController::class, 'index'])->name('product.index');

Route::get('/product/{id?}', [ProdutoController::class, 'show'])->name('product.show');
*/

Route::resource('products', ProductController::class);
