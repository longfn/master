<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::resource('user', UserController::class, [
        'names' => [
            'index' => 'admin.user.index',
            'create' => 'admin.user.create',
            'store' => 'admin.user.store',
        ]
    ]);
    Route::resource('role', RoleController::class, [
        'names' => [
            'index' => 'admin.role.index',
        ]
    ]);
    Route::resource('permission', PermissionController::class, [
        'names' => [
            'index' => 'admin.permission.index',
        ]
    ]);
    Route::resource('category', CategoryController::class, [
        'names' => [
            'index' => 'admin.category.index',
        ]
    ]);
    Route::resource('product', ProductController::class, [
        'names' => [
            'index' => 'admin.product.index',
        ]
    ]);
});
