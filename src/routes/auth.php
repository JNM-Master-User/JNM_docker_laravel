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
use App\Http\Controllers\Admin\UserController;
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
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfilController;
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

    Route::middleware('verified')->group(function () {

        Route::get('profil', [ProfilController::class, 'createProfil'])
            ->name('profil');
        Route::post('profil', [ProfilController::class, 'destroyBookingUserEvent'])
            ->name('booking.user.event.destroy');
        Route::post('profil', [ProfilController::class, 'destroyBookingUserAllotment'])
            ->name('booking.user.allotment.destroy');
        Route::post('profil', [ProfilController::class, 'destroySubscriptionUserNavigo'])
            ->name('subscription.user.navigo.destroy');

        Route::get('bookings', [BookingController::class, 'createBookings'])
            ->name('bookings');

        Route::get('events', [BookingController::class, 'createEvents'])
            ->name('events');
        Route::post('events', [BookingController::class, 'storeBookingUserEvent'])
            ->name('booking.user.event.store');

        Route::get('allotments', [BookingController::class, 'createAllotments'])
            ->name('allotments');
        Route::post('allotments', [BookingController::class, 'storeBookingUserAllotment'])
            ->name('booking.user.allotment.store');

        Route::get('transports', [BookingController::class, 'createTransports'])
            ->name('transports');
        Route::post('transports', [BookingController::class, 'storeSubscriptionUserNavigo'])
            ->name('subscription.user.navigo.store');

        Route::middleware('admin')->prefix('dashboard')->group(function () {

            Route::post('roles_save',[RoleController::class, 'storeRole'])
                ->name('roles.save');
            Route::post('roles_destroy',[RoleController::class, 'destroyRole'])
                ->name('roles.destroy');
            Route::post('roles_update',[RoleController::class, 'updateRoles'])
                ->name('roles.update');

            Route::post('partners_save',[PartnerController::class, 'storePartner'])
                ->name('partners.save');
            Route::post('partners_destroy',[PartnerController::class, 'destroyPartner'])
                ->name('partners.destroy');
            Route::post('partners_update',[PartnerController::class, 'updatePartners'])
                ->name('partners.update');

            Route::post('poles_save',[PoleController::class, 'storePole'])
                ->name('poles.save');
            Route::post('poles_destroy', [PoleController::class, 'destroyPole'])
                ->name('poles.destroy');
            Route::post('poles_update',[PoleController::class, 'updatePoles'])
                ->name('poles.update');

            Route::post('institutions_save',[InstitutionController::class, 'storeInstitution'])
                ->name('institutions.save');
            Route::post('institutions_destroy',[InstitutionController::class, 'destroyInstitutions'])
                ->name('institutions.destroy');
            Route::post('institutions_update',[InstitutionController::class, 'updateInstitutions'])
                ->name('institutions.update');

            Route::post('services_save',[ServiceController::class, 'storeService'])
                ->name('services.save');
            Route::post('services_destroy',[ServiceController::class, 'destroyService'])
                ->name('services.destroy');
            Route::post('services_update',[ServiceController::class, 'updateServices'])
                ->name('services.update');

            Route::post('tournaments_save',[TournamentController::class, 'storeTournament'])
                ->name('tournaments.save');
            Route::post('tournaments_destroy',[TournamentController::class, 'destroyTournament'])
                ->name('tournaments.destroy');

            Route::post('videos_save',[VideoController::class, 'storeVideo'])
                ->name('videos.save');
            Route::post('videos_destroy',[VideoController::class, 'destroyVideos'])
                ->name('videos.destroy');

            Route::post('transports_save',[TransportController::class, 'storeTransport'])
                ->name('transports.save');
            Route::post('transports_destroy',[TransportController::class, 'destroyTransport'])
                ->name('transports.destroy');

            Route::post('users_save',[UserController::class, 'storeUser'])
                ->name('users.save');
            Route::post('users_destroy', [UserController::class, 'destroyUser'])
                ->name('users.destroy');

            Route::post('users_status_save',[UserStatusController::class, 'storeUserStatus'])
                ->name('users_status.save');
            Route::post('users_status_destroy', [UserStatusController::class, 'destroyUserStatus'])
                ->name('users_status.destroy');

            Route::post('allotments_save',[AllotmentController::class, 'storeAllotment'])
                ->name('allotments.save');
            Route::post('allotments_destroy', [AllotmentController::class, 'destroyAllotment'])
                ->name('allotments.destroy');
            Route::post('allotments_update', [AllotmentController::class, 'updateAllotment'])
                ->name('allotments.update');

            Route::post('contacts_save',[ContactController::class, 'storeContact'])
                ->name('contacts.save');
            Route::post('contacts_destroy',[ContactController::class, 'destroyContact'])
                ->name('contacts.destroy');
            Route::post('contacts_update',[ContactController::class, 'updateContacts'])
                ->name('contacts.update');

            Route::post('events_save',[EventController::class, 'storeEvent'])
                ->name('events.save');
            Route::post('events_destroy',[EventController::class, 'destroyEvent'])
                ->name('events.destroy');
            Route::post('events_update',[EventController::class, 'updateEvents'])
                ->name('events.update');

            Route::get('accueil',[DashboardController::class, 'renderAccueil'])
                ->name('dashboard.accueil');
        });
    });
});
