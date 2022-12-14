<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


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

Route::get("/", [\App\Http\Controllers\ProductController::class , "home" ])->name('product.home');
Route::get("/home", [\App\Http\Controllers\HomeController::class , "index" ])->name('home');

// Route::get("/save",[\App\Http\Controllers\HomeController::class , "save"]);
Auth::routes();
// Route::get('/',[ProductController::class, 'index'])->name('product.index');

//Product routes

Route::get("/product",[ProductController::class, 'index'])->name('product.index')->middleware('auth');
Route::get("/product/create",[ProductController::class, 'create'])->name('product.create')->middleware('auth');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/product/save",[ProductController::class, 'store'])->name('product.save')->middleware('auth'); 

Route::get("/product/edit/{id}",[ProductController::class,'edit'])->name('product.edit')->middleware('auth');
Route::post("/product/update/{id}",[ProductController::class,'update'])->name('product.update')->middleware('auth');
Route::post("/product/delete/{id}",[ProductController::class,'destroy'])->name('product.delete')->middleware('auth');

//cart routes

Route::get("/cart",[CartController::class,'index'])->name('cart.index')->middleware('auth');
Route::get("/cart/add/{id}",[CartController::class,'addToCart'])->name('cart.addToCart')->middleware('auth');
Route::get("/cart/buy/{id}",[CartController::class,'buyNow'])->name('cart.buyNow')->middleware('auth');



Route::get("/create",[CartController::class,'create'])->name('cart.create')->middleware('auth');
Route::get("/cart/increase/{id}",[CartController::class,'increaseQuantity'])->name('cart.increaseQuantity')->middleware('auth');
Route::get("/cart/decrease/{id}",[CartController::class,'decreaseQuantity'])->name('cart.decreaseQuantity')->middleware('auth');
Route::get("/cart/delete/{id}",[CartController::class,'destroy'])->name('cart.delete')->middleware('auth');
