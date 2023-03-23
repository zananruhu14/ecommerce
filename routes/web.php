<?php

use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\ProductStore;
use App\Http\Controllers\RegisterController;
use App\Http\Livewire\admindepartemen;
use App\Http\Livewire\CustomerController;
use App\Http\Livewire\Dashboardcontroller;
use App\Http\Livewire\OrderController;
use App\Http\Livewire\ProductController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', admindepartemen::class);
Route::get('/login', [Logincontroller::class, 'index'])->name('login');
Route::post('/sikeu/logout', [Logincontroller::class, 'logout']);
Route::post('/login', [Logincontroller::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('dashboard', Dashboardcontroller::class)->middleware('auth');
Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});

// product
Route::get('product', ProductController::class)->middleware('auth');
Route::get('product/create', [ProductStore::class, 'index'])->middleware('auth')->name('product.create');
Route::post('product/create', [ProductStore::class, 'store'])->middleware('auth');
Route::get('product/edit/{id}', [ProductStore::class, 'edit'])->middleware('auth');
Route::post('product/edit/{id}', [ProductStore::class, 'update'])->middleware('auth');

// customer
Route::get('customer', CustomerController::class)->middleware('auth');

// Order
Route::get('order', OrderController::class)->middleware('auth');
