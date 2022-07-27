<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->group(function () {
    Route::name('user.')->prefix('user')->group(function () {
        Route::get('form-send-email', [UserController::class, 'getMailForm'])->name('form-send-email');
        Route::post('send', [UserController::class, 'sendMail'])->name('send');
    });
    Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
    Route::resource('role', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('permission', PermissionController::class);
});

Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', function () {
    return redirect()->route('admin.user.index');
});
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
