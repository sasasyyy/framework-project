<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Guest Routes (Tanpa Login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Dashboard menggunakan DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Dummy Routes untuk Navigasi (Mencegah RouteNotFoundException)
    Route::get('/products', function () { return 'Halaman Produk'; })->name('products.index');
    Route::get('/report/sales', function () { return 'Halaman Laporan'; })->name('report.sales');
    Route::get('/pos', function () { return 'Halaman Transaksi'; })->name('pos.index');
    Route::get('/pos/history', function () { return 'Halaman Riwayat Transaksi'; })->name('pos.history');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Khusus Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});