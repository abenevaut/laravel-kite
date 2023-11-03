<?php

use abenevaut\Kite\Http\Controllers\{
    Auth\AuthenticatedSessionController,
    Auth\NewPasswordController,
    Auth\PasswordResetLinkController,
    Auth\RegisteredUserController
};
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
