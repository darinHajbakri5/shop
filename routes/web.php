<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

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
Route::get('/homePage', function () {
    return view('home');
});

//store
Route::get('/store', [StoreController::class, 'index'])->name('home');
Route::get('/create', [StoreController::class, 'create'])->name('create');
Route::post('/create/users', [StoreController::class, 'store'])->name('store.create');
Route::get('/edit/{store}', [storeController::class, 'edit'])->name('store.edit');
Route::put('/store/edit/{store}', [StoreController::class, 'update'])->name('store.update');
Route::get('/store/{store}', [StoreController::class, 'show'])->name('store.show');
Route::get('/delete/{store}', [StoreController::class, 'destroy'])->name('store.delete');
Route::get('/manage', [StoreController::class, 'manage'])->name('manage.store');

//products
Route::get('/', [ProductController::class, 'indexAll'])->name('product');
Route::get('/products/{store}', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'createProduct'])->name('create.product');
Route::post('product/create/users', [ProductController::class, 'storeProduct'])->name('store.product');
Route::get('product/edit/{product}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::put('/product/update/{product}', [ProductController::class, 'updateProduct'])->name('product.update');
Route::delete('/products/{product}', [ProductController::class, 'destroyProduct'])->name('product.delete');


//cart
Route::get('/cart/myproduct', [CartController::class, 'viewCart'])->name('index.cart')->middleware('auth');
Route::post('/cart/myproduct/{product}', [CartController::class, 'addcart'])->name('addCart')->middleware('auth');
Route::delete('/cart/myproduct/{cart}/delete', [CartController::class, 'deletecart'])->name('deleteCart')->middleware('auth');


//user
Route::get('/login', [UserController::class, 'login'])->name('loginshow');
Route::post('/users/authenticate' , [UserController::class, 'authenticate' ])->name('login');
Route::post('/logout' , [UserController::class, 'logout' ])->name('logout');
Route::get('/register/sellers', [UserController::class, 'sellersRegister'])->name('seller');
Route::get('/register/customers', [UserController::class, 'customersRegister'])->name('customers');
Route::post('/users/sellerregister', [UserController::class, 'register'])->name('sellerregister');
Route::post('/users/customerregister', [UserController::class, 'customerregister'])->name('customersregister');
Route::get('/register/admin', [UserController::class, 'adminRegister'])->name('admin');

//admin:
//admin register
Route::get('/register/admin', [AdminController::class, 'adminRegister'])->name('admin');
Route::post('/users/adminregister', [AdminController::class, 'registeradmin']);
//customers list
Route::get('/users/customer', [AdminController::class, 'customer'])->name('customer.list');
Route::get('customer/create', [AdminController::class, 'createcustomer'])->name('customer.create');
Route::post('customer/store', [AdminController::class, 'storecustomer'])->name('customer.store');
Route::get('customer/edit/{customer}', [AdminController::class, 'editcustomer'])->name('customer.edit');
Route::put('/customer/edit/{customer}', [AdminController::class, 'updatecustomer'])->name('customer.update');
Route::get('/customer/delete/{customer}', [AdminController::class, 'destroycustomer'])->name('customer.delete');
//sellers list
Route::get('/users/seller', [AdminController::class, 'seller'])->name('seller.list');
Route::get('seller/create', [AdminController::class, 'createseller'])->name('seller.create');
Route::post('seller/store', [AdminController::class, 'storeseller'])->name('seller.store');
Route::get('seller/edit/{seller}', [AdminController::class, 'editseller'])->name('seller.edit');
Route::put('/seller/edit/{seller}', [AdminController::class, 'updateseller'])->name('seller.update');
Route::get('/seller/delete/{seller}', [AdminController::class, 'destroyseller'])->name('seller.delete');

