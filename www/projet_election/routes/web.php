<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\ImageProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ClassroomController;



//Welcome pages
Route::get('/', function () {return view('welcome');})->name('/');
Auth::routes();


//Home pages
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::Post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



//Account pages
Route::get('/account', [HomeController::class, 'account'])->name('account');
Route::post('/account/upload_image', [ImageProfileController::class,'upload_image'])->name('upload_image');


//Classroom manager pages
Route::get('/classroom/manager', [ClassroomController::class, 'index'])->name('classroom-manager');
Route::get('/classroom/manager/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');
Route::post('/classroom/manager/add_event', [ClassroomController::class, 'add_event'])->name('add_event');


//Classroom user pages
Route::get('/election', [ElectionController::class, 'index'])
    ->name('election.index');

Route::post('/election', [ElectionController::class, 'store'])
    ->name('election.store');



