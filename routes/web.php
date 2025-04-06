<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;
use App\Models\Product;

Route::get('/',function (){
    return view('acceuil');
});
Route::get('/clients',[CustomerController::class,'index']);
Route::get('/customer/Add',[CustomerController::class,'AddForm']);
Route::post('/customer/store',[CustomerController::class,'store']);
Route::get('/suppliers',[SupplierController::class,'index']);
Route::get('/customer/edit/{customer}',[CustomerController::class,'GetEditPage']);
Route::put('/customer/{id}/edit',[CustomerController::class,'edit']);
Route::get('/customer/delete/{customer}',[CustomerController::class,'getDeletePage']);
Route::delete('/customer/{customer}/delete',[CustomerController::class,'delete']);


Route::get('/products',[ProductController::class,'index']);
Route::get('/getProductByCat',[CategoryController::class,'index']);
Route::get('/api/getProducts/{store}',[ProductController::class,'byStore']);
Route::post('/product/store',[ProductController::class,'store'])->name('products.store');
Route::put('/product/update/{product}',[ProductController::class,'update'])->name("products.update");
Route::delete('/product/delete/{product}',[ProductController::class,'delete'])->name('products.destroy');
Route::get('/api/productsByCat/{category}',[ProductController::class,'Products_By_Cat']);
Route::get('/getProductBySupp',[SupplierController::class,'products']);
Route::get('/api/productBysupplier/{supplier}',[ProductController::class,'bysupplier']);


Route::get("/getProStore",[StoreController::class,'stores']);

Route::get('/api/getProductBystore/{store}',[ProductController::class,'byStore']);

Route::get('/orders',[OrderController::class,'index']);
Route::post('/orders/customers',[OrderController::class,'getCustomers'])->name('order.customer');
Route::get('/api/orders/customer/{customer}',[OrderController::class,'getOrders']);
Route::get('/api/order/{order}/data',[OrderController::class,'getproducts']);