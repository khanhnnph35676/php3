<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthenController;


Route::get('login',[AuthenController::class,'login']) ->name('login');
Route::post('login',[AuthenController::class,'postLogin'])->name('postLogin');


Route::group(['prefix'=>'admin',
            'as'=>'admin.',
            'middleware'=>'checkAdmin'],function(){
    Route::group(['prefix'=>'products','as' => 'products.'],function(){
        // list product
        Route::get('/',[ProductController::class,'listProducts']) ->name('listProducts');

        Route::get('add-product',[ProductController::class,'addProduct']) ->name('addProduct');
        Route::post('add-product',[ProductController::class,'addPostProduct']) ->name('addPostProduct');

        Route::delete('delete-product',[ProductController::class,'deleteProduct']) ->name('deleteProduct');
    });
});
