<?php
use App\Http\Controllers\Dashboard\CategoryControllar;
use App\Http\Controllers\Dashboard\ProductsControllar;
use App\Http\Controllers\Dashboard\PackagesControllar;
use App\Http\Controllers\Dashboard\SettingControllar;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;




 
Route::group(['prefix' => 'dashboard' , 'as' => 'dashboard.', 'middleware' => ['auth', 'checkLogin']], function () {

    Route::get('/', function () {
        return view('dashboard.layouts.layout');
    })->name('index');

    Route::get('/settings', [SettingControllar::class, 'index'])->name('settings');
    Route::Post('/settings/update/{setting}', [SettingControllar::class, 'update'])->name('settings.update');

    
    Route::get('/Products/all', [ProductsControllar::class, 'get'])->name('Products.all');
    Route::Post('/Products/delete', [ProductsControllar::class, 'delete'])->name('Products.delete');
    Route::Post('/Products/store', [ProductsControllar::class, 'store'])->name('Products.storeProduct');
    Route::Post('/Products/update/{Product}', [ProductsControllar::class, 'update'])->name('Products.updatePr');


    
    Route::get('/category/all', [CategoryControllar::class, 'get'])->name('category.all');
    Route::Post('/category/delete', [CategoryControllar::class, 'delete'])->name('category.delete');




    Route::get('/users/all', [UserController::class, 'get'])->name('users.all');
    Route::Post('/users/delete', [UserController::class, 'delete'])->name('users.delete');


    Route::get('Packages/all', [PackagesControllar::class, 'get'])->name('Packages.all');
    Route::post('Packages/delete', [PackagesControllar::class, 'delete'])->name('Packages.delete');
    Route::Post('Packages/store', [PackagesControllar::class, 'store'])->name('Packages.storeProduct');
    Route::Post('Packages/update/{Package}', [PackagesControllar::class, 'update'])->name('Packages.updatePk');



    Route::resources([
        'users' => UserController::class,
        'category' => CategoryControllar::class,
        'Products' => ProductsControllar::class,
        'Packages' => PackagesControllar::class,

     ]);
});