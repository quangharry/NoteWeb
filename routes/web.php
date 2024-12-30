<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// // Route cho dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    // Route resource cho NoteController
    Route::resource('note', NoteController::class);
});

// Route cho profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route cho xác thực người dùng (nếu bạn đã cài đặt Laravel Breeze)
require __DIR__.'/auth.php';

Route::redirect('/', '/note')->name('dashboard');