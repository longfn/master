<?php

use App\Http\Controllers\Admin\UserController;
use App\Services\MailService;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('/user/form-send-email', [UserController::class, 'getMailForm'])->name('user.form-send-email');
    Route::post('/user/send', [UserController::class, 'sendMail'])->name('user.send');
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('permission', PermissionController::class);
});
