<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Home
Route::get('/cafe-amandemy', [HomeController::class, 'index'])->name('home');

// Product
Route::get('/product', [ProductController::class, 'product'])->name('products.product');
Route::get('/form', [ProductController::class, 'createForm'])->name('products.create');
Route::post('/form', [ProductController::class, 'store'])->name('products.store');

// List Product
Route::get('/listproduct', [ProductController::class, 'listProduct'])->name('products.listproduct');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//Detail Product
Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct'])->name('products.detailproduct');

// User Login
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.store');

// User Registration
Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.store');

// User Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'showDashboard'])->name('dashboard');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/export', [UserDashboardController::class, 'exportData'])->name('export');
});

//admin
Route::group(['middleware' => ['role:admin']], function () {
    // Rute untuk halaman "Manage Product"
    Route::get('/manage-product', 'ProductController@index');

    // Definisikan rute lain yang memerlukan hak akses admin di sini
    // Contoh:
    //Route::get('/admin/dashboard', 'AdminController@dashboard');
    //Route::post('/admin/products/create', 'ProductController@create');
    //Route::post('/admin/products/update/{id}', 'ProductController@update');
    //Route::delete('/admin/products/delete/{id}', 'ProductController@delete');
});

