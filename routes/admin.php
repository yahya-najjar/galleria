<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'dashboard'])
    ->name('dashboard');

Route::get('/changeLanguage.{local}',[HomeController::class, 'changeLanguage'])
    ->name('changeLanguage');

Route::resource('admins', '\App\Http\Controllers\Admin\AdminController');
Route::resource('users', '\App\Http\Controllers\Admin\UserController');
Route::resource('roles', '\App\Http\Controllers\Admin\RoleController');
Route::resource('categories', '\App\Http\Controllers\Admin\CategoryController');

