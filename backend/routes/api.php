<?php

use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\Courses\CourseController;
use App\Http\Controllers\AuthController;
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
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/systems', [SystemController::class, 'index']);
    });
});

Route::resource('/course', CourseController::class);