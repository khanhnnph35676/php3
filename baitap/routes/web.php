<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// use App\Http\Controllers\thongtinSVController;


// Route::get('/thongtin-sv',[thongtinSVController::class, 'thongtinSV']);

// Route::get('/list-user',[UserController::class, 'showUser']);
// Slug
// Route::get('/get-user/{id}/{name?}',[UserController::class, 'getUser']);
// Params 
// Route::get('/update-user',[UserController::class, 'updateUser']);
// crud : http://127.0.0.1:8000/users/list-users
// Route::group(['prefix' => 'users', 'as' =>'users.'], function(){
//     Route::get('list-users',[UserController::class, 'listUsers']) -> name('listUsers');

//     Route::get('add-user',[UserController::class, 'addUser'])-> name('addUser');
//     Route::post('add-user',[UserController::class, 'addPostUser'])-> name('addPostUser');

//     Route::get('delete-user/{idUser}',[UserController::class, 'deleteUser']) ->name('deleteUser');

//     Route::get('/update-user/{idUser}',[UserController::class, 'updateUser'])-> name('updateUser');
//     Route::post('/update-user',[UserController::class, 'updatePostUser'])-> name('updatePostUser');
// });

Route::group(['prefix' => 'product' ,'as' => 'product.'], function (){
    Route::get('list-product',[ProductController::class, 'listProducts'])-> name('listProducts');

    Route::get('add-product',[ProductController::class, 'addProduct'])-> name('addProduct');
    Route::post('add-product',[ProductController::class, 'addPostProduct'])-> name('addPostProduct');

    Route::get('delete-product/{id}',[ProductController::class, 'deleteProduct'])-> name('deleteProduct');
    
    Route::get('update-product/{id}',[ProductController::class, 'updateProduct'])-> name('updateProduct');
    Route::post('update-product',[ProductController::class, 'updatePostProduct'])-> name('updatePostProduct');
});
