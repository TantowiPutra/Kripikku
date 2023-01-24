<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductpageController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/aboutus', [HomeController::class, 'about']);

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->middleware('guest');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Products
Route::get('/home/products', [ProductpageController::class, 'index']);
Route::delete('/home/products/{product:id}', [ProductpageController::class, 'deleteComment'])->middleware('auth');
Route::get('/home/products/{product:id}', [ProductpageController::class, 'detail']);
Route::post('/home/products/{product:id}', [ProductpageController::class, 'addComment'])->middleware('auth');
Route::post('/home/products/{product:id}/cart', [ProductpageController::class, 'addCart'])->middleware('auth');
Route::get('/home/products/{product:id}/cart', [ProductpageController::class, 'removeCart'])->middleware('auth');

// Cart
Route::get('/home/profile/cart', [CartController::class, 'index'])->middleware('user');
Route::delete('home/profile/{cart:id}', [CartController::class, 'removeCart'])->middleware('user');
Route::post('/home/profile/cart/validation', [CartController::class, 'validation'])->middleware('user');
Route::patch('/home/profile/cart/validation', [CartController::class, 'validated'])->middleware('user');

// Profile
Route::get('/home/profile/{user:username}', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/home/profile/{user:username}/edit', [ProfileController::class, 'update'])->middleware('auth');
Route::post('/home/profile/{user:username}/edit', [ProfileController::class, 'confirmUpdate'])->middleware('auth');

// Dashboard
Route::get('/home/dashboard', [DashboardController::class, 'index'])->middleware('user');
Route::get('/home/dashboard/transaction', [DashboardController::class, 'history'])->middleware('user');
Route::get('/home/dashboard/print', [DashboardController::class, 'print'])->middleware('user');

// Dashboard, Tambah Produk
Route::get('/home/dashboard/addProduct', [DashboardController::class, 'add_product_page'])->middleware('user');
Route::post('/home/dashboard/addProduct', [DashboardController::class, 'store'])->middleware('user');

Route::get('/home/dashboard/{product:id}', [DashboardController::class, 'update_product_page'])->middleware('user');
Route::post('/home/dashboard/{product:id}/delete', [DashboardController::class, 'delete'])->middleware('user');
Route::patch('/home/dashboard/{product:id}/patch', [DashboardController::class, 'update'])->middleware('user');

// Transaction History
Route::get('/home/transaction_history', [TransactionController::class, 'index'])->middleware('user');
