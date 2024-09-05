<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadFilesController;
use App\Http\Controllers\Auth\LogoutController;
// use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Routes for uploading file
Route::get('/upload', [UploadFilesController::class, 'showUploadForm'])->middleware('auth');
Route::post('/upload', [UploadFilesController::class, 'upload'])->middleware('auth');

// Route for logout
Route::get('/logout', function () {
    return view('auth.logout');
})->middleware('auth');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

