<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

//Dashboard
Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/upload', function () {
    return view('upload');
})->middleware(['auth', 'verified'])->name('upload');

// Auth
Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //File
    Route::get('/dashboard', [FileController::class, 'index'])->name('dashboard');
    // Route::get('/upload', [FileController::class, 'index'])->name('upload');
    Route::post('/upload', [FileController::class, 'upload'])->name('upload');
    Route::delete('/file/{id}', [FileController::class, 'delete'])->name('file.delete');
    Route::get('/file/preview/{id}', [FileController::class, 'preview'])->name('file.preview');
});

require __DIR__ . '/auth.php';
