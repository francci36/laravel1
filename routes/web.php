<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;


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

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/',[ProductController::class, 'viewAll']
);
Route::get('/details/{id}', [ProductController::class, 'view'])->name('product.details');
Route::get('/ajout/{id}', [ProductController::class, 'ajouter']);
Route::get('/panier', [ProductController::class, 'panier']);
Route::get('/validation', [ProductController::class, 'validation'])->name('validation');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/creer',[ProductController::class,'creer'])->name('creer');
    Route::post('product/save', [ProductController::class,'save'])->name('save');
    Route::get('/product/modify/{id}', [ProductController::class,'modify'])->name('modify');
    Route::put('/product/save-modify/{id}', [ProductController::class,'saveModify'])->name('saveModify');
    Route::delete('/product/delete/{id}', [ProductController::class,'delete'])->name('delete');
});




require __DIR__.'/auth.php';
