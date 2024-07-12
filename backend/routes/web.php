<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    ProfileController,
    MailSettingController,
    PaymentController,
};
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test-mail', function () {

    $message = "Testing mail";

    Mail::raw('Hi, welcome!', function ($message) {
        $message->to('')
            ->subject('Testing mail');
    });
});

Route::middleware('front')->group(function () {
    Route::get('/dashboard', function () {
        view('front.dashboard');
    })->name('dashboard');
});
require __DIR__ . '/front_auth.php';


// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/systems', [DashboardController::class, 'index'])->name('admin.systems');
});
require __DIR__ . '/auth.php';



Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('systems', SystemController::class);
    Route::resource('notifications', NotificationController::class);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/mail', [MailSettingController::class, 'index'])->name('mail.index');
    Route::put('/mail-update/{mailsetting}', [MailSettingController::class, 'update'])->name('mail.update');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
});
