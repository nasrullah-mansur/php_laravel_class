<?php

use App\Http\Controllers\AppearanceController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
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
        // Route::middleware('admin')->group(function() {
        // });
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
        Route::resource('user', UserController::class)->except(['show', 'destroy']);
        Route::post('user/delete', [UserController::class, 'destroy'])->name('user.delete');


        // Blog;
        Route::get('/blogs', [BlogController::class, 'index'])->name('back.blog.index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('back.blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('back.blog.store');
        Route::get('/blog/edit/{slug}', [BlogController::class, 'edit'])->name('back.blog.edit');
        Route::post('/blog/update/{slug}', [BlogController::class, 'update'])->name('back.blog.update');
        Route::post('/blog/delete', [BlogController::class, 'delete'])->name('back.blog.delete');



        // Email;
        Route::get('/email/create', [EmailController::class, 'create'])->name('back.email.create');
        Route::post('/email/store', [EmailController::class, 'store'])->name('back.email.store');

        // Appearance;
        Route::get('/appearance/create', [AppearanceController::class, 'create'])->name('back.appearance.create');
        Route::post('/appearance/store', [AppearanceController::class, 'store'])->name('back.appearance.store');


        // Social;
        Route::get('/social/create', [SocialController::class, 'create'])->name('back.social.create');
        Route::post('/social/store', [SocialController::class, 'store'])->name('back.social.store');

        // Contact;
        Route::get('/contact/create', [ContactController::class, 'create'])->name('back.contact.create');
        Route::post('/contact/store', [ContactController::class, 'store'])->name('back.contact.store');


        // Role;
        Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::post('/roles/delete', [RoleController::class, 'destroy'])->name('role.delete');


        // Role;
        Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::post('/permission/delete', [PermissionController::class, 'destroy'])->name('permission.delete');

    });
});

