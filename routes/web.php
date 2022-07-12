<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/user', function () {
    return view('adminUser');
});
Route::get('/admin/role', function () {
    return view('adminRole');
});
Route::get('/admin/permission', function () {
    return view('adminPermission');
});
Route::get('/admin/category', function () {
    return view('adminCategory');
});
Route::get('/admin/product', function () {
    return view('adminProduct');
});
