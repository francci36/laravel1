<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


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
Route::get('/',[ProductController::class, 'viewAll']
);
Route::get('/details/{id}', [ProductController::class, 'view'])->name('product.details');

Route::get('/ajout/{id}', [ProductController::class, 'ajouter']);
Route::get('/panier', [ProductController::class, 'panier']);
Route::get('/validation', [ProductController::class, 'validation'])->name('validation');
Route::get('/creer',[ProductController::class,'creer'])->name('creer');
Route::post('product/save', [ProductController::class,'save'])->name('save');


