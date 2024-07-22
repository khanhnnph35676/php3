<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

Route::group(['prefix'=>'admin', 'as'=>'admin.'],function(){
    Route::group(['prefix'=>'products','as' => 'products.'],function(){
        // list product
        Route::get('/',[ProductController::class,'listProducts']) ->name('listProducts');

        Route::get('add-product',[ProductController::class,'addProduct']) ->name('addProduct');
        Route::post('add-product',[ProductController::class,'addPostProduct']) ->name('addPostProduct');

    });
});