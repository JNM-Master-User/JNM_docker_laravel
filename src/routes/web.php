<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.welcome');
});

/*Route::get('/dashboard/home', function () {
    return view('pages.dashboard')->with(array('content_dashboard'=>true));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/users', function () {
    return view('pages.dashboard')->with(array('content_users'=>true));
})->middleware(['auth', 'verified'])->name('dashboard');*/

require __DIR__.'/auth.php';
