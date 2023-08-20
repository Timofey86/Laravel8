<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin/posts');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login_process', [AuthController::class, 'login'])->name('login_process');
});

Route::middleware('auth:admin')->group(function (){
    Route::get('logout',[ AuthController::class, 'logout'])->name('logout');

    Route::resource('admin_users', AdminUserController::class);
    Route::resource('posts', PostController::class);
});

