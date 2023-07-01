<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::middleware('r')->group(function (){
//    Route::get('/', [IndexController::class, 'index'])->name('home');
//    Route::post('/contact_form', [IndexController::class, 'index'])->name('contact_form');
//
//    Route::prefix('news')/*->middleware('r')*/->group(function (){
//        Route::post('{id}',[IndexController::class, 'index'])->name('news');
//    });
//});
Route::get('/', [ IndexController::class, 'index'])->name('home');
//Route::post('/contact_form', [IndexController::class, 'index'])->name('contact_form');
Route::get('/posts',[ PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}',[ PostController::class, 'show'])->name('posts.show');
