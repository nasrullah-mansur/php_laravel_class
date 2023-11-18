<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// These are dashboard routes;
Route::middleware('auth')->group(function() {
    Route::prefix('admin')->group(function() {
        // Dashboard;
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Blog Categories;
        Route::get('/categories', [CategoryController::class, 'index'])->name('back.category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('back.category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('back.category.store');

        Route::get('/category/{slug}', [CategoryController::class, 'edit'])->name('back.category.edit');
        Route::post('/category/update/{slug}', [CategoryController::class, 'update'])->name('back.category.update');

        Route::post('/category/delete', [CategoryController::class, 'delete'])->name('back.category.delete');
    });
});

