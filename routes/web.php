<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->group(function () {
    Route::name('user.')->prefix('user')->group(function () {
        Route::get('form-send-email', [UserController::class, 'getMailForm'])->name('form-send-email');
        Route::post('send', [UserController::class, 'sendMail'])->name('send');
    });
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('permission', PermissionController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
