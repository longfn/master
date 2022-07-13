<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::prefix('admin')->group(function() {
    // Route::prefix('user')->group(function() {
    //     Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
    //     Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
    // });
    Route::resource('user', UserController::class, [
        'names' => [
            'index' => 'admin.user.index',
            'create' => 'admin.user.create',
            'store' => 'admin.user.store',
        ]
    ]);
    Route::get('/role', function() {
        return view('admin.role');
    })->name('admin.role');
    Route::get('/permission', function() {
        return view('admin.permission');
    })->name('admin.permission');
    Route::get('/category', function() {
        return view('admin.category');
    })->name('admin.category');
    Route::get('/product', function() {
        return view('admin.product');
    })->name('admin.product');
});
