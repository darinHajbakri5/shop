<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiStoreController;
use App\Http\Controllers\ApiProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('store')->group(function () {
    Route::get('', [ApiStoreController::class, 'index'])->name('home');
    Route::post('create/users', [ApiStoreController::class, 'store'])->name('store.create');
    Route::put('edit/{store}', [ApiStoreController::class, 'update'])->name('store.update');
    Route::get('{store}', [ApiStoreController::class, 'show'])->name('store.show');
    Route::get('/delete/{store}', [ApiStoreController::class, 'destroy'])->name('store.delete');
    });
Route::get('manage', [ApiStoreController::class, 'manage'])->name('manage.store');
Route::get('', [ApiProductController::class, 'indexAll'])->name('product');

    Route::prefix('product')->group(function () {
        Route::get('{store}', [ApiProductController::class, 'index'])->name('product.index');
        Route::post('create/users', [ApiProductController::class, 'storeProduct'])->name('store.product');
        Route::put('update/{product}', [ApiProductController::class, 'updateProduct'])->name('product.update');
        Route::delete('{product}', [ApiProductController::class, 'destroyProduct'])->name('product.delete');
        });

