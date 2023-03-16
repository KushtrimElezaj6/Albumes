<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageController;
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


Route::get('/', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums/store', [AlbumController::class , 'store'])->name('albums.store');
Route::get('/albums/{albums}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{album}/update', [AlbumController::class, 'update'])->name('albums.update');
Route::get('/albums/{albums}/destroy', [AlbumController::class, 'destroy'])->name('albums.destroy');
Route::get('/albums/{albums}/show', [AlbumController::class, 'show'])->name('albums.show');






Route::get('/album/image/create', [ImageController::class, 'create'])->name('iamges.create');
Route::post('/album/image/store', [ImageController::class , 'store'])->name('images.store');
Route::get('/album/{album}/image/edit', [ImageController::class, 'edit'])->name('images.edit');
Route::put('/album/{album}/image/update', [ImageController::class, 'update'])->name('images.update');
Route::get('/image/{image}/image/destroy', [ImageController::class, 'destroy'])->name('images.destroy');
