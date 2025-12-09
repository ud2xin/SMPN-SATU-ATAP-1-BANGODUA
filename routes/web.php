<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grup route admin
Route::middleware(['auth', IsAdmin::class])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin'
        ]);
    });

    // route lain-lain admin
    Route::get('/admin/galeri', function () {
        return view('admin.galeri');
    });

});

require __DIR__.'/auth.php';
