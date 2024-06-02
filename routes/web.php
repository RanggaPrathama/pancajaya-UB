<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



    Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('loginPost');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('regsiterPost');
Route::get('/',[UserController::class,'homeUser'])->name('homeUser');




    Route::get('/katalog',[UserController::class,'katalog'])->name('katalog');
Route::get('/cart/{id}',[CartController::class,'index'])->name('cart');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');

Route::get('/pembayaran/{id}',[PembayaranController::class,'index'])->name('pembayaran');
Route::post('/pemesanan/store',[PemesananController::class,'store'])->name('pemesanan.store');
Route::post('/pembayaran/store',[PembayaranController::class,'store'])->name('pembayaran.store');
Route::get('/verifikasi',[PembayaranController::class,'verifikasi'])->name('verifikasi');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('loginPost');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('regsiterPost');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
/*==========      ADMIN PRIVLLEGE ===========   */

Route::get('/homeAdmin',[UserController::class,'homeAdmin'])->name('homeAdmin');
Route::get('/laporanTransaksi',[PembayaranController::class,'laporanTransaksi'])->name('laporanTransaksi');
/* ==========  PRODUCT ==========  */
Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/products/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/products/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

/* ============= ONGKIR ============= */
Route::get('/ongkir',[OngkirController::class,'index'])->name('ongkir.index');
Route::get('/ongkir/create',[OngkirController::class,'create'])->name('ongkir.create');
Route::post('/ongkir/store',[OngkirController::class,'store'])->name('ongkir.store');
Route::get('/ongkir/edit/{id}',[OngkirController::class,'edit'])->name('ongkir.edit');
Route::put('/ongkir/update/{id}',[OngkirController::class,'update'])->name('ongkir.update');
Route::delete('/ongkir/delete/{id}',[OngkirController::class,'delete'])->name('ongkir.delete');

/* ============= Payment ============= */
Route::get('/payments',[PaymentController::class,'index'])->name('payment.index');
Route::get('/payments/create',[PaymentController::class,'create'])->name('payment.create');
Route::post('/payments/store',[PaymentController::class,'store'])->name('payment.store');
Route::get('/payments/edit/{id}',[PaymentController::class,'edit'])->name('payment.edit');
Route::put('/payments/update/{id}',[PaymentController::class,'update'])->name('payment.update');
Route::delete('/payments/delete/{id}',[PaymentController::class,'delete'])->name('payment.delete');

