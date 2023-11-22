<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;

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


        // Sliders;
        Route::get('/sliders', [SliderController::class, 'index'])->name('back.slider.index');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('back.slider.create');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('back.slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('back.slider.edit');
        Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('back.slider.update');
        Route::post('/slider/delete', [SliderController::class, 'delete'])->name('back.slider.delete');


        // Users;
        Route::resource('user', UserController::class);


        // Route::get('user', [UserController::class, 'index'])->name('user.index');
        // Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
        // Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        // Route::post('user', [UserController::class, 'store'])->name('user.store');
        // Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        // Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
        // Route::post('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');




    });
});

