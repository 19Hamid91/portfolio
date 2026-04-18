<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/{project:slug}', [HomeController::class, 'show'])->name('projects.show');

// Redirect dashboard to admin projects
Route::get('/dashboard', function () {
    return redirect()->route('admin.projects.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes (CMS)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::resource('projects', ProjectController::class);
    Route::resource('technologies', TechnologyController::class);
});

// User Account Management (Breeze default)
Route::middleware('auth')->prefix('account')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('account.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('account.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('account.destroy');
});

require __DIR__.'/auth.php';
