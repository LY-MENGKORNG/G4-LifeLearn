<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReferencesController;
use App\Http\Controllers\Api\Assigment\AssigmentController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\Api\Calendar\CalendarController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\Payment\DocumnetController;
use App\Http\Controllers\Api\Payment\PaymentController;
use App\Http\Controllers\API\SystemController;
use App\Http\Controllers\AuthController;
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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login', [FrontuserController::class, 'login']);


// protected routes
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth:sanctum')->group(function () {

    // user login
    Route::get('/me', [AuthController::class, 'index']);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/systems', [SystemController::class, 'index']);
    });
    Route::resource('/course', CourseController::class);

    //subject
    Route::resource('/subject', SubjectController::class);

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

    // system routes
    Route::prefix('system')->group(function () {
        Route::resource('/', SystemController::class);
    });

    // category routes
    Route::get('/category/list', [CategoryController::class, 'index']);
    Route::post('/category/create', [CategoryController::class, 'store']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
    Route::put('/category/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    //classroom
    Route::resource('/classroom', ClassroomController::class);

    //documents
    Route::prefix('/document')->group(function () {
        Route::get('/list', [DocumnetController::class, 'index']);
        Route::post('/create', [DocumnetController::class, 'store']);
        Route::get('/show/{id}', [DocumnetController::class, 'show']);
        Route::put('/update/{id}', [DocumnetController::class, 'update']);
        Route::delete('/delete/{id}', [DocumnetController::class, 'destroy']);
    });
    //references   
    Route::prefix('/references')->group(function () {
        Route::get('/list', [ReferencesController::class, 'index']);
        Route::post('/create', [ReferencesController::class, 'store']);
        Route::get('/show/{id}', [ReferencesController::class, 'show']);
        Route::put('/update/{id}', [ReferencesController::class, 'update']);
        Route::delete('/delete/{id}', [ReferencesController::class, 'destroy']);
    });
    //payments  
    Route::prefix('/payment')->group(function () {
        Route::get('/list', [PaymentController::class, 'index']);
        Route::post('/create', [PaymentController::class, 'store']);
        Route::get('/show/{id}', [PaymentController::class, 'show']);
        Route::put('/update/{id}', [PaymentController::class, 'update']);
        Route::delete('/delete/{id}', [PaymentController::class, 'destroy']);
    });
    //books
    Route::resource('books', BookController::class);

    //calendar
    Route::resource('/calendar', CalendarController::class);

    Route::get('/notification/list', [NotificationController::class, 'index']);
    Route::post('/notification/create', [NotificationController::class, 'store']);
    Route::get('/notification/{id}', [NotificationController::class, 'show']);
    Route::put('/notification/update/{id}', [NotificationController::class, 'update']);
    Route::delete('/notification/delete/{id}', [NotificationController::class, 'destroy']);
});
