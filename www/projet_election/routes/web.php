<?php

use Illuminate\Support\Facades\Route;

//Welcome and login pages
Route::get('/', function () {return view('welcome');})->name('/');

Route::Post('/accountlogout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('accountlogout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

