<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\ImageProfileController;

Route::get('/election', [ElectionController::class, 'index'])
    ->name('election.index');

Route::post('/election', [ElectionController::class, 'store'])
    ->name('election.store');


use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
//Welcome and login pages
Route::get('/', function () {return view('welcome');})->name('/');

Route::Post('/accountlogout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('accountlogout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('account');
Route::post('/upload_image', [ImageProfileController::class,'upload_image'])->name('upload_image');
Route::get('/common-life', [App\Http\Controllers\HomeController::class, 'common_life'])->name('common-life');



