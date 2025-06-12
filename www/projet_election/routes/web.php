<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectionController;

Route::get('/election', [ElectionController::class, 'index'])
    ->name('election.index');

Route::post('/election', [ElectionController::class, 'store'])
    ->name('election.store');


Route::get('/', function () {
    return view('welcome');
});
