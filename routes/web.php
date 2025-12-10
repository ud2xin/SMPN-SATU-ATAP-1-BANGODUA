<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Frontend\GaleriFrontendController;
use App\Http\Controllers\Frontend\TentangController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Frontend\EkstrakurikulerFrontendController;

Route::get('/', function () {
    return view('welcome');
});

// Galeri Frontend
Route::get('/galeri', [GaleriFrontendController::class, 'index'])
    ->name('galeri.index');

Route::get('/galeri/{id}', [GaleriFrontendController::class, 'show'])
    ->name('galeri.show');

// Tentang (Visi-Misi dan Sejarah)
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Ekstrakurikuler Frontend
Route::get('/ekstrakurikuler', [EkstrakurikulerFrontendController::class, 'index'])->name('frontend.ekstrakurikuler.index');
Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerFrontendController::class, 'show'])->name('frontend.ekstrakurikuler.show');

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

            // berita
            Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class);

            // Ekstrakurikuler
                Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
});

require __DIR__.'/auth.php';
