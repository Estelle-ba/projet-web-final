<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\OtpController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/verify-otp', [OtpController::class, 'showForm'])->name('otp.form');
Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify');
