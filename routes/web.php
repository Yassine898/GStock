<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SupplierController;

Route::get('/',function (){
    return view('acceuil');
});

Route::get('/clients',[CustomerController::class,'index']);

Route::get('/suppliers',[SupplierController::class,'index']);

Route::get('/products',[ProductController::class,'index']);

Route::get('/getProductByCat',[CategoryController::class,'index']);
Route::get('/api/getProducts/{store}',[ProductController::class,'byStore']);


Route::get('/api/productsByCat/{category}',[ProductController::class,'Products_By_Cat']);

Route::get('/getProductBySupp',[SupplierController::class,'products']);

Route::get('/api/productBysupplier/{supplier}',[ProductController::class,'bysupplier']);


Route::get("/getProStore",[StoreController::class,'stores']);

Route::get('/api/getProductBystore/{store}',[ProductController::class,'byStore']);


