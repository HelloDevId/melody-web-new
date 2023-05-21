<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AuthController::class, 'index'])->middleware('IsStay');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');
Route::put('/profil-update/{id}', [AuthController::class, 'profilupdate'])->middleware('IsLogin');

Route::get('/product', [ProductController::class, 'index'])->middleware('IsLogin');
Route::post('/product-add', [ProductController::class, 'store'])->middleware('IsLogin');
Route::put('/product-edit/{id}', [ProductController::class, 'update'])->middleware('IsLogin');
Route::post('/product-delete', [ProductController::class, 'destroy'])->middleware('IsLogin');
Route::get('/product-restore', [ProductController::class, 'restoreproduct'])->middleware('IsLogin');
route::get('/product-pulihkan/{id}', [ProductController::class, 'restore'])->middleware('IsLogin');
Route::post('/product-force-delete', [ProductController::class, 'deleteproduct'])->middleware('IsLogin');


Route::get('/kategori', [KategoriController::class, 'index'])->middleware('IsLogin');
Route::post('/kategori-add', [KategoriController::class, 'store'])->middleware('IsLogin');
Route::put('/kategori-edit/{id}', [KategoriController::class, 'update'])->middleware('IsLogin');
Route::delete('/kategori-delete/{id}', [KategoriController::class, 'destroy'])->middleware('IsLogin');
Route::get('/kategori-restore', [KategoriController::class, 'restorekategori'])->middleware('IsLogin');
route::get('/kategori-pulihkan/{id}', [KategoriController::class, 'restore'])->middleware('IsLogin');
Route::delete('/kategori-force-delete/{id}', [KategoriController::class, 'forcedeletekategori'])->middleware('IsLogin');


Route::get('/user', [UserController::class, 'index'])->middleware('IsLogin');
Route::post('/user-add', [UserController::class, 'store'])->middleware('IsLogin');
Route::put('/user-edit/{id}', [UserController::class, 'update'])->middleware('IsLogin');
Route::post('/user-delete', [UserController::class, 'destroy'])->middleware('IsLogin');
Route::get('/user-restore', [UserController::class, 'restoreuser'])->middleware('IsLogin');
route::get('/user-pulihkan/{id}', [UserController::class, 'restore'])->middleware('IsLogin');
Route::post('/user-force-delete', [UserController::class, 'forcedelete'])->middleware('IsLogin');

Route::get('/post', [PostController::class, 'index'])->middleware('IsLogin');
Route::post('/post-add', [PostController::class, 'store'])->middleware('IsLogin');
Route::put('/post-edit/{id}', [PostController::class, 'update'])->middleware('IsLogin');
Route::post('/post-delete', [PostController::class, 'destroy'])->middleware('IsLogin');
Route::get('/post-restore', [PostController::class, 'restorepost'])->middleware('IsLogin');
route::get('/post-pulihkan/{id}', [PostController::class, 'restore'])->middleware('IsLogin');
Route::post('/post-force-delete', [PostController::class, 'deletepost'])->middleware('IsLogin');

Route::get('/blog', [PostController::class, 'indexlanding']);
Route::get('/detail-blog/{id}', [PostController::class, 'detailpost']);


Route::get('/', [ProductController::class, 'indexlanding']);
Route::get('/index', [ProductController::class, 'indexlanding']);
Route::get('/detail-product/{id}', [ProductController::class, 'detailproduct']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('IsLogin');