<?php

use App\Http\Controllers\Auth\SaveUserSensitiveDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| profil
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {
    /*Route::post('user-sensitive-data/save', [SaveUserSensitiveDataController::class, 'store'])
        ->name('user.user-sensitive-data.save');

    Route::get('user-sensitive-data/delete', [SaveUserSensitiveDataController::class, 'destroy'])
        ->name('user.user-sensitive-data.destroy');*/
});