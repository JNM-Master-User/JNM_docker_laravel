<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\InstitutionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SaveUserSensitiveDataController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::prefix('user')->group(function () {
        Route::post('user-sensitive-data', [SaveUserSensitiveDataController::class, 'store'])
            ->name('user-sensitive-data.save');

        Route::get('user-sensitive-data', [SaveUserSensitiveDataController::class, 'destroy'])
            ->name('user-sensitive-data.destroy');
    });
    Route::prefix('dashboard')->group(function () {
        Route::post('roles',[DashboardController::class, 'storeRoles'])
            ->name('roles.save');
        Route::post('partners',[DashboardController::class, 'storePartners'])
            ->name('partners.save');
        Route::post('poles',[DashboardController::class, 'storePoles'])
            ->name('poles.save');

        Route::post('institutions',[InstitutionController::class, 'storeInstitutions'])
            ->name('institutions.save');


        Route::get('home',[DashboardController::class, 'renderHome'])
            ->name('home');
        Route::get('users',[DashboardController::class, 'renderUsers'])
            ->name('users');
        Route::get('roles',[DashboardController::class, 'renderRoles'])
            ->name('roles');
        Route::get('poles',[DashboardController::class, 'renderPoles'])
            ->name('poles');
        Route::get('partners',[DashboardController::class, 'renderPartners'])
            ->name('partners');
        Route::get('transports',[DashboardController::class, 'renderTransports'])
            ->name('transports');
        Route::get('institutions',[DashboardController::class, 'renderInstitutions'])
            ->name('institutions');
    });
});
