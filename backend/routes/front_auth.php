<?php

use App\Http\Controllers\Front\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Front\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Front\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Front\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Front\Auth\NewPasswordController;
use App\Http\Controllers\Front\Auth\PasswordResetLinkController;
use App\Http\Controllers\Front\Auth\RegisteredUserController;
use App\Http\Controllers\Front\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create']) // get form register
                ->middleware('guest:front')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']) // create user registered
                ->middleware('guest:front');

Route::get('/login', [AuthenticatedSessionController::class, 'create']) // get form login
                ->middleware('guest:front')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']) // login process
                ->middleware('guest:front');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create']) // get form forgot password
                ->middleware('guest:front')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']) // forgot password reset
                ->middleware('guest:front')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create']) // get form reset token
                ->middleware('guest:front')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store']) // store new token
                ->middleware('guest:front')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke']) 
                ->middleware('front')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['front', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['front', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('front')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('front');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('front')
                ->name('logout');



// New Password Routes (after resetting)
Route::get('/reset-password', [NewPasswordController::class, 'create'])
    ->middleware('front')
    ->name('password.new');
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('front')
    ->name('password.store');