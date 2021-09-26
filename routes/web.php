<?php

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




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-category', [\App\Http\Controllers\CategoryController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/add-category', [\App\Http\Controllers\CategoryController::class,'addCategory']);
Route::middleware(['auth:sanctum', 'verified'])->post('/save-category', [\App\Http\Controllers\CategoryController::class,'saveCategory']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-tag', [\App\Http\Controllers\TagController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-author', [\App\Http\Controllers\AuthorController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/add-author', [\App\Http\Controllers\AuthorController::class,'addAuthor']);
Route::middleware(['auth:sanctum', 'verified'])->post('/save-author', [\App\Http\Controllers\AuthorController::class,'saveAuthor']);

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-blog', [\App\Http\Controllers\BlogController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/add-blog', [\App\Http\Controllers\BlogController::class,'addBlog']);
Route::middleware(['auth:sanctum', 'verified'])->post('/save-blog', [\App\Http\Controllers\BlogController::class,'saveBlog']);
