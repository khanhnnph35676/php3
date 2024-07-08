<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\thongtinSVController;


Route::get('/thongtin-sv',[thongtinSVController::class, 'thongtinSV']);

Route::get('/list-user',[UserController::class, 'showUser']);
// Slug
Route::get('/get-user/{id}/{name?}',[UserController::class, 'getUser']);
// Params 
Route::get('/update-user',[UserController::class, 'updateUser']);
