<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/post', [HomeController::class,'post'])->middleware(['auth','admin']);
Route::get('/addproduct', [ProductController::class,'addproduct'])->middleware(['auth','admin'])->name('addproduct');
Route::get('/products', [ProductController::class,'allproducts'])->middleware(['auth','admin'])->name('products');
Route::get('/sales', [ProductController::class,'sales'])->middleware(['auth','admin'])->name('sales');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


