<?php

use App\Http\Controllers\ProfileController;
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
    
});

Route::middleware('auth')->group(function(){

    // Customer
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add/{product}',[CartController::class,'add'])->name('cart.add');
    Route::post('/checkout',[CheckoutController::class,'checkout'])->name('checkout');

    // Admin
    Route::middleware('can:admin')->prefix('admin')->group(function(){
        Route::get('/orders',[Admin\OrderController::class,'index'])->name('admin.orders');
        Route::get('/orders/{order}',[Admin\OrderController::class,'show'])->name('admin.orders.show');
    });

});


require __DIR__.'/auth.php';
