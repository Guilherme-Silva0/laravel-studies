<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/product/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');

Route::get('/cart', [CartController::class, 'cartList'])->name('site.cart');
Route::post('/cart', [CartController::class, 'addToCart'])->name('site.cart.add');
Route::post('/cart-remove', [CartController::class, 'removeCart'])->name('site.cart.remove');
Route::post('/cart-update', [CartController::class, 'updateCart'])->name('site.cart.update');
Route::get('/cart-clear', [CartController::class, 'clearCart'])->name('site.cart.clear');

Route::view('/login', 'login.form')->name('login.form');
Route::post('auth', [LoginController::class, 'auth'])->name('login.auth');
