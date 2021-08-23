<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get(Admin::generateAdminUrl('login'), [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post(Admin::generateAdminUrl('login'), [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get(Admin::generateAdminUrl('forgot-password'), [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post(Admin::generateAdminUrl('forgot-password'), [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get(Admin::generateAdminUrl('reset-password/{token}'), [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post(Admin::generateAdminUrl('reset-password'), [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get(Admin::generateAdminUrl('verify-email'), [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get(Admin::generateAdminUrl('verify-email/{id}/{hash}'), [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
