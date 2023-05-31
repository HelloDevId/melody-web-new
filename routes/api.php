<?php

use App\Http\Controllers\ApiAntrianController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiKategoriController;
use App\Http\Controllers\ApiKeluhanController;
use App\Http\Controllers\ApiKonsultasiController;
use App\Http\Controllers\ApiKulitController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/signin', [ApiAuthController::class, 'sign_in']);
Route::post('/signup', [ApiAuthController::class, 'sign_up']);

//product
Route::get('/product', [ApiProductController::class, 'index']);
Route::get('/productall', [ApiProductController::class, 'all']);
Route::get('/product/{id_kategori}', [ApiProductController::class, 'show']);

//kategori
Route::get('/kategori', [ApiKategoriController::class, 'index']);
//kulit
Route::get('/kulit', [ApiKulitController::class, 'kulit']);
//keluhan
Route::get('/keluhan', [ApiKeluhanController::class, 'keluhan']);
//post
Route::get('/posts/user', [ApiPostController::class, 'getDataByUserId']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/userlogin', [ApiAuthController::class, 'userlogin']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::put('updateprofile', [ApiAuthController::class, 'updateProfile']);
    Route::post('/ufoto', [ApiAuthController::class, 'updateFoto']);
    Route::post('/updatepass', [ApiAuthController::class, 'updatePassword']);
    Route::post('/antrian', [ApiAntrianController::class, 'insert']);
    Route::get('/konsultasi', [ApiKonsultasiController::class, 'show']);
    Route::get('/konsultasibs', [ApiKonsultasiController::class, 'noantrian']);
});
