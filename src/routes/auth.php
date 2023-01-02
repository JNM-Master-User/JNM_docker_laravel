<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Admin\AllotmentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InstitutionController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PoleController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\UserStatusController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
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

Route::middleware(['auth'])->group(function () {

    Route::get('accueil', [AccueilController::class, 'create'])
        ->name('accueil')->middleware('verified');

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
    Route::middleware(['admin','verified'])->prefix('dashboard')->group(function () {

        Route::post('roles_save',[RoleController::class, 'storeRoles'])
            ->name('roles.save');
        Route::post('roles_destroy',[RoleController::class, 'destroyRoles'])
            ->name('roles.destroy');
        Route::post('roles_update',[RoleController::class, 'updateRoles'])
            ->name('roles.update');

        Route::post('partners_save',[PartnerController::class, 'storePartners'])
            ->name('partners.save');
        Route::post('partners_destroy',[PartnerController::class, 'destroyPartners'])
            ->name('partners.destroy');

        Route::post('poles_save',[PoleController::class, 'storePoles'])
            ->name('poles.save');
        Route::post('poles_destroy', [PoleController::class, 'destroyPoles'])
            ->name('poles.destroy');

        Route::post('institutions_save',[InstitutionController::class, 'storeInstitutions'])
            ->name('institutions.save');
        Route::post('institutions_destroy',[InstitutionController::class, 'destroyInstitutions'])
            ->name('institutions.destroy');

        Route::post('services_save',[ServiceController::class, 'storeServices'])
            ->name('services.save');
        Route::post('services_destroy',[ServiceController::class, 'destroyServices'])
            ->name('services.destroy');
        Route::post('services_update',[ServiceController::class, 'updateServices'])
            ->name('services.update');

        Route::post('tournaments_save',[TournamentController::class, 'storeTournaments'])
            ->name('tournaments.save');
        Route::post('tournaments_destroy',[TournamentController::class, 'destroyTournaments'])
            ->name('tournaments.destroy');
        Route::post('tournaments_update',[TournamentController::class, 'updateTournaments'])
            ->name('tournaments.update');

        Route::post('videos_save',[VideoController::class, 'storeVideos'])
            ->name('videos.save');
        Route::post('videos_destroy',[VideoController::class, 'destroyVideos'])
            ->name('videos.destroy');
        Route::post('videos_update',[VideoController::class, 'updateVideos'])
            ->name('videos.update');

        Route::post('transports_save',[TransportController::class, 'storeTransports'])
            ->name('transports.save');
        Route::post('transports_destroy',[TransportController::class, 'destroyTransports'])
            ->name('transports.destroy');
        Route::post('transports_update',[TransportController::class, 'updateTransports'])
            ->name('transports.update');

        Route::post('users_status_save',[UserStatusController::class, 'storeUsersStatus'])
            ->name('users_status.save');
        Route::post('users_status_destroy', [UserStatusController::class, 'destroyUsersStatus'])
            ->name('users_status.destroy');
        Route::post('users_status_update',[UserStatusController::class, 'updateUserStatus'])
            ->name('users_status.update');

        Route::post('allotments_save',[AllotmentController::class, 'storeAllotments'])
            ->name('allotments.save');
        Route::post('allotments_destroy', [AllotmentController::class, 'destroyAllotments'])
            ->name('allotments.destroy');
        Route::post('allotments_update', [AllotmentController::class, 'updateAllotments'])
            ->name('allotments.update');

        Route::post('contacts_save',[ContactController::class, 'storeContacts'])
            ->name('contacts.save');
        Route::post('contacts_destroy',[ContactController::class, 'destroyContacts'])
            ->name('contacts.destroy');

        Route::post('events_save',[EventController::class, 'storeEvents'])
            ->name('events.save');
        Route::post('events_destroy',[EventController::class, 'destroyEvents'])
            ->name('events.destroy');

        Route::get('accueil',[DashboardController::class, 'renderAccueil'])
            ->name('accueil');
    });
});
