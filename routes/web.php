<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\ProductController;

use App\Http\Middleware\checking;

Route::get('/',[ProductController::class,'index'])->name('/');

Route::get('/products',[ProductController::class,'products'])->name('products')->middleware('auth');
Route::get('/add_product',[ProductController::class,'add_product'])->name('add_product');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('delete');
Route::post('/saveproduct',[ProductController::class,'store'])->name('saveproduct');
Route::post('/saveproductupdate/{id}',[ProductController::class,'update'])->name('update');

Route::get('/all_customers',[ProductController::class,'all_customers'])->name('all_customers')->middleware('auth');
Route::get('/add_customer',[ProductController::class,'add_customer'])->name('add_customer');
Route::post('/addcustomer',[ProductController::class,'addcustomer'])->name('addcustomer');
Route::get('/register',[ProductController::class,'register'])->name('register');
Route::get('/login',[ProductController::class,'login'])->name('login');
Route::post('/registersave',[ProductController::class,'registersave'])->name('registersave');
Route::post('/loginmatch',[ProductController::class,'loginmatch'])->name('loginmatch');

Route::post('/logout',[ProductController::class,'logout'])->name('logout');

Route::get('/invoice/{id}', [ProductController::class, 'invoice'])
    ->name('invoice');
Route::post('/deletecustomer/{id}', [ProductController::class, 'deletecustomer'])
    ->name('deletecustomer');
