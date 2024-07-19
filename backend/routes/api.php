<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReferencesController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\AssignmentController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\CalendarController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\NotificationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\QuizzeController;
use App\Http\Controllers\API\CommentController;
// use App\Http\Controllers\API\DocumentController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\SubmiteController;
use App\Http\Controllers\Front\FrontuserController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\GradeController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\MylearnController;
use App\Http\Controllers\API\ScoreController;
use App\Http\Controllers\API\ClassesController;
use App\Http\Controllers\API\ReferenceController;
use App\Http\Controllers\Front\Auth\PasswordResetLinkController;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Auth\ForgotPasswordManager;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SystemController as APISystemController;
use App\Http\Controllers\API\UserController as APIUserController;

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
// user login
Route::post('/admin/login', [AuthController::class, 'loginadmin']);
Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::post('/login', [FrontuserController::class, 'login']);
Route::post('/system/login', [FrontuserController::class, 'login']);
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']) // forgot password reset
    ->middleware('guest:front')
    ->name('password.email');
Route::get('/course/list', [CourseController::class, 'index'])->name('course.list');



Route::post('/reset-password', [ForgotPasswordManager::class, 'ResetPasswordPost'])->name('password.update');



// protected routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [FrontuserController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/principle/logout', [AuthController::class, 'principlelogout']);
    Route::resource('/course', CourseController::class);

    Route::post('/edit-profile', [APIUserController::class, 'editProfile']);

    //subject
    Route::resource('/subject', SubjectController::class);

    // Lesson
    Route::resource('/lesson', LessonController::class);

    // assignment
    Route::prefix('assigment')->group(function () {
        Route::get('/list', [AssignmentController::class, 'index']);
        Route::post('/create', [AssignmentController::class, 'store']);
        Route::get('/show/{id}', [AssignmentController::class, 'show']);
        Route::put('/update/{id}', [AssignmentController::class, 'update']);
        Route::delete('/{id}', [AssignmentController::class, 'destroy']);
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
        Route::get('/list', [DocumentController::class, 'index']);
        Route::post('/create', [DocumentController::class, 'store']);
        Route::get('/show/{id}', [DocumentController::class, 'show']);
        Route::put('/update/{id}', [DocumentController::class, 'update']);
        Route::delete('/delete/{id}', [DocumentController::class, 'destroy']);
    });
    //references   
    Route::prefix('/references')->group(function () {
        Route::get('/list', [ReferencesController::class, 'index']);
        Route::post('/create', [ReferencesController::class, 'store']);
        Route::get('/show/{id}', [ReferencesController::class, 'show']);
        Route::put('/update/{id}', [ReferencesController::class, 'update']);
        Route::delete('/delete/{id}', [ReferencesController::class, 'destroy']);
    });

    //grade
    Route::resource('/grade', GradeController::class);

    //calendar
    Route::resource('/calendar', CalendarController::class);

    // notifications
    Route::get('/notification/list', [NotificationController::class, 'index']);
    Route::post('/notification/create', [NotificationController::class, 'store']);
    Route::get('/notification/{id}', [NotificationController::class, 'show']);
    Route::put('/notification/update/{id}', [NotificationController::class, 'update']);
    Route::delete('/notification/delete/{id}', [NotificationController::class, 'destroy']);

    Route::resource('/favorites', FavoriteController::class);
    Route::resource('/mylearn', MylearnController::class);

    // favorites
    Route::resource('/favorites', FavoriteController::class);

    //Quize
    // Route::resource('/quizze', QuizController::class);
    Route::post('/quizze', [QuizController::class, 'store']);
    //submit
    Route::get('/submite/list', [SubmiteController::class, 'index']);
    Route::post('/submite/create', [SubmiteController::class, 'store']);
    Route::get('/submite/show/{id}', [SubmiteController::class, 'show']);
    Route::put('/submite/update/{id}', [SubmiteController::class, 'update']);
    Route::delete('/submite/delete/{id}', [SubmiteController::class, 'destroy']);

    //comments
    Route::resource('/comment', CommentController::class);

    //score
    Route::resource('/score', ScoreController::class);
    Route::resource('/principle', NotificationsController::class);
    // Route::post('/principle/request',NotificationsController::class, 'create');

    //class
    Route::resource('/class', ClassesController::class);

    // books
    Route::resource('/books', BookController::class);

    // Mail
    Route::post('/send-mail', [MailController::class, 'sendMail']);
    Route::post('/principle-invite', [MailController::class, 'sendMail']);

    // Invite Mail
    // Route::post('/send-mail-to-student', [MailController::class, 'sendMail']);


    // Route to handle the forgot password form submission
    Route::post('/forgot-password', [ForgotPasswordManager::class, 'ForgotPasswordPost'])->name('password.email');
    // student 
    Route::get('/student/list', [StudentController::class, 'index'])->name('student.list');


    Route::post('/classrooms/{classroomId}/add-student', [ClassroomController::class, 'addStudents']);
    Route::get('/classrooms/{classroomId}/list-students', [ClassroomController::class, 'listStudents']);
    // Request to buy system
    Route::post('/system-request', [ReferenceController::class, 'store'])->name('system.request');

    // Create system
    Route::post('/system-create', [APISystemController::class, 'store']);

    Route::get('system', [APISystemController::class, 'show']);

    // get session
    Route::get('/session', [PaymentController::class, 'getSession']);

    // create payment list
    Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent']);

    // webhook
    Route::post('/webhook', [PaymentController::class, 'getWebhook']);

});

// event 
Route::get('/events', [EventController::class,  'index']);
Route::post('events', [EventController::class, 'store']);
Route::put('events/{id}', [EventController::class, 'update']);
Route::delete('events/{id}', [EventController::class, 'destroy']);

