<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KaryaController;
use App\Http\Controllers\Frontend\GaleriFrontendController;
use App\Http\Controllers\Frontend\BeritaFrontendController;
use App\Http\Controllers\Frontend\TentangController;
use App\Http\Controllers\Frontend\KaryaFrontendController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\HeroController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Galeri Frontend
Route::get('/galeri', [GaleriFrontendController::class, 'index'])
    ->name('galeri.index');

Route::get('/galeri/{id}', [GaleriFrontendController::class, 'show'])
    ->name('galeri.show');

// Berita Frontend
Route::get('/berita', [BeritaFrontendController::class, 'index'])->name('frontend.berita');
Route::get('/berita/{slug}', [BeritaFrontendController::class, 'show'])->name('frontend.single-berita');

// karya
Route::get('/karya', [KaryaFrontendController::class, 'index'])->name('frontend.karya');
Route::get('/karya/{id}', [KaryaFrontendController::class, 'show'])->name('frontend.single-karya');


// Tentang (Visi-Misi dan Sejarah)
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

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

            // karya
            Route::resource('karya', KaryaController::class);

            Route::get('hero', [HeroController::class, 'index'])->name('hero.index');
            Route::get('hero/{hero}/edit', [HeroController::class, 'edit'])->name('hero.edit');
            Route::put('hero/{hero}', [HeroController::class, 'update'])->name('hero.update');
    });

require __DIR__.'/auth.php';
