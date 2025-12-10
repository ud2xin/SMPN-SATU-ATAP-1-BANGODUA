<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Frontend\GaleriFrontendController;

Route::get('/', function () {
    return view('welcome');
});

// Galeri Frontend
Route::get('/galeri', [GaleriFrontendController::class, 'index'])
    ->name('galeri.index');

Route::get('/galeri/{id}', [GaleriFrontendController::class, 'show'])
    ->name('galeri.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grup route admin
    Route::middleware(['auth', IsAdmin::class])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Dashboard
            Route::get('/dashboard', function () {
                return view('admin.dashboard', [
                    'title' => 'Dashboard Admin'
                ]);
            })->name('dashboard');

            // Galeri
            Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
            Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
            Route::post('/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
            Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
            Route::put('/galeri/{id}/update', [GaleriController::class, 'update'])->name('galeri.update');
            Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
        });

require __DIR__.'/auth.php';
