<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Role 
Route::patch('role/restore/{id}', [RoleController::class, 'restore']);
//Access_Permission
Route::patch('access/restore/{id}', [AccessController::class, 'restore']);
//User
Route::patch('user/restore/{id}', [UserController::class, 'restore']);
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('access', AccessController::class);
