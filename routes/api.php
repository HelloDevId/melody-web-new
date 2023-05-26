<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiKategoriController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/signup', [ApiAuthController::class, 'sign_up']);
Route::post('/signin', [ApiAuthController::class, 'sign_in']);

//product
Route::get('/product', [ApiProductController::class, 'index']);
Route::get('/productall', [ApiProductController::class, 'all']);
Route::get('product/{id_kategori}', [ApiProductController::class, 'show']);

//kategori
Route::get('/kategori', [ApiKategoriController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/userlogin', [ApiAuthController::class, 'userlogin']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/updateprofil', [ApiAuthController::class, 'updateProfile']);
    Route::post('/ufoto', [ApiAuthController::class, 'updateFoto']);
    Route::post('/updatepass', [ApiAuthController::class, 'updatePassword']);
    Route::get('/posts/user', [ApiPostController::class, 'getDataByUserId']);
});
