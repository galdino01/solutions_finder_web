<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\api\PostApiController;
use App\Http\Controllers\api\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/register', [AuthApiController::class, 'register']);
Route::post('auth/login', [AuthApiController::class, 'login']);
Route::post('auth/logout', [AuthApiController::class, 'logout'])->middleware('auth:api');
Route::get('/users', [UserApiController::class, 'index'])->middleware('auth:api');

Route::post('post/create', [PostApiController::class, 'store']);
Route::get('/posts', [PostApiController::class, 'index'])->middleware('auth:api');
