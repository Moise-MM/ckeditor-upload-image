<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[ProductController::class,'index'])->name('product.index');
Route::post('/upload_image',[ProductController::class, 'uploadImage'])->name('upload');
Route::post('/save',[ProductController::class, 'store'])->name('store');
Route::get('/all',[ProductController::class, 'all'])->name('all');