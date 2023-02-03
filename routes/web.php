<?php
use App\Http\Controllers\Website\IndexControllar;
use App\Http\Controllers\Dashboard\productControllar;
use App\Http\Controllers\Dashboard\UserController;

use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [IndexControllar::class, 'index'])->name('index');
Route::post('/', [IndexControllar::class, 'contact'])->name('index.contact');

// Route::get('/categories/{category}', [CategoryControllar::class, 'show'])->name('category');
// Route::get('/product/{product}', [productControllar::class, 'show'])->name('product');

Route::resources([
    'users' => UserController::class,
    // 'category' => CategoryControllar::class,
    // 'products' => productsControllar::class,
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//  Route::get('/999', function () {
//     return view('auth.login');
// });
 




