<?php

use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\SystemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\Front\FrontuserController;
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
Route::post('/register', [FrontuserController::class, 'register']);
Route::post('/login', [FrontuserController::class, 'login']);

Route::post('/admin/login', [AuthController::class, 'login']); // admin login



// protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/systems', [SystemController::class, 'index']);
    });
});

//course
Route::resource('/course', CourseController::class);
//subject
Route::resource('/subject', SubjectController::class);

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


// category
Route::prefix('category')->group(function () {
    Route::get('/list', [CategoryController::class, 'index']);
    Route::post('/create', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});
//classroom
Route::resource('/classroom',ClassroomController::class);
//books
Route::resource('books',BookController::class);