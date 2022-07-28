<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\VerifyAdminMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['auth', 'verified', 'verify.admin'])->group(function () {
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

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

