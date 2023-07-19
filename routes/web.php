<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about', [GeneralController::class, 'about'])->name('page.about');
    Route::get('/products', [ProductController::class, 'index'])->name('page.products');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('page.product.detail');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('page.checkout');
    Route::post('/checkout', [CheckoutController::class, 'addToCart'])->name('page.checkout.add');
    Route::post('/checkoutclear', [CheckoutController::class, 'clearAllCart'])->name('page.checkout.clear');
    Route::post('/checkoutupdate', [CheckoutController::class, 'updateCart'])->name('page.checkout.update');

    Route::get('/transaction', [TransactionController::class, 'index'])->name('page.transaction');
    Route::post('/transaction-store', [TransactionController::class, 'store'])->name('page.transaction.store');
});

require __DIR__.'/auth.php';
