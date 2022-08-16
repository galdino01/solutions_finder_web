<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('', function () {
    return view('auth.login');
})->middleware('guest')->name('index');

Route::resource('post', App\Http\Controllers\PostController::class);
Route::get('admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('accessLevel:2');
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('accessLevel:1');
Route::get('user/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('user.edit')->middleware('accessLevel:1');
Route::put('user/edit', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update')->middleware('accessLevel:1');

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('acesso-negado', function () {
    return view('acesso-negado');
})->middleware('accessLevel:0')->name('acesso-negado');
