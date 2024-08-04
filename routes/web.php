<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route untuk pengondisian jika user yang login bertype admin
Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);

// Route untuk view category dashboard admin
Route::get('view_category', [AdminController::class,'view_category'])->middleware(['auth','admin']);

// Route untuk mengirim category yang dibuat oleh admin ke database
Route::post('add_category', [AdminController::class,'add_category'])->middleware(['auth','admin']);

// Route untuk delete data category
Route::post('delete_category/{id}', [AdminController::class,'delete_category'])->middleware(['auth','admin']);

// Route untuk edit category
Route::get('edit_category/{id}', [AdminController::class, 'editCategory'])->middleware(['auth','admin']);

// Route untuk update category
Route::post('update_category/{id}', [AdminController::class, 'updateCategory'])->middleware(['auth','admin']);

// Route untuk menambahkan product
Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin']);

// Route untuk upload product
Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth','admin']);

// Route untuk view product
Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth','admin']);

// Route untuk delete product di view product
Route::delete('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth','admin'])->name('delete_product');

// Route untuk edit product di view product
Route::get('/admin/edit_product/{id}', [AdminController::class, 'edit'])->name('edit_product')->middleware(['auth','admin']);

// Route untuk update product after edit di view product
Route::post('/admin/update_product/{id}', [AdminController::class, 'update'])->name('update_product')->middleware(['auth','admin']);

// Route untuk search product
Route::get('/search_product', [AdminController::class, 'search'])->name('search_product')->middleware(['auth','admin']);

// Route untuk menampilkan view after search data product
Route::get('/view_product', [AdminController::class, 'index'])->name('view_product')->middleware(['auth','admin']);