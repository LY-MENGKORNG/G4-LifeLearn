<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Api\Assigment\AssigmentController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\AuthController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public routes
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');


// protected routes
Route::middleware('auth:sanctum')->group(function () {
});
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


// category
Route::prefix('category')->group(function () {
    Route::get('/list', [CategoryController::class, 'index']);
    Route::post('/create', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

// assignment
Route::prefix('assigment')->group(function () {
    Route::get('/list', [AssigmentController::class, 'index']);
    Route::post('/create', [AssigmentController::class, 'store']);
    Route::get('/show/{id}', [AssigmentController::class, 'show']);
    Route::put('/update/{id}', [AssigmentController::class, 'update']);
    Route::delete('/{id}', [AssigmentController::class, 'destroy']);
});
