<?php

use abenevaut\Kite\Http\Controllers\Auth\AuthenticatedSessionController;
use abenevaut\Kite\Http\Controllers\Auth\ConfirmablePasswordController;
use abenevaut\Kite\Http\Controllers\Auth\EmailVerificationNotificationController;
use abenevaut\Kite\Http\Controllers\Auth\EmailVerificationPromptController;
use abenevaut\Kite\Http\Controllers\Auth\NewPasswordController;
use abenevaut\Kite\Http\Controllers\Auth\PasswordController;
use abenevaut\Kite\Http\Controllers\Auth\PasswordResetLinkController;
use abenevaut\Kite\Http\Controllers\Auth\RegisteredUserController;
use abenevaut\Kite\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'guest'])->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->middleware(['throttle:login'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

});

Route::middleware(['web', 'auth'])->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');

});
