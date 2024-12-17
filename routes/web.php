<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\InterventionController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Middleware pour restreindre l'accès en fonction du rôle
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard pour les admins uniquement
    Route::get('/dashboardadmin', function () {
        Gate::authorize('isAdmin');
        return Inertia::render('Admin/Dashboard');
    })->name('dashboardadmin');

    // Dashboard pour les techniciens uniquement
    Route::get('/dashboard', function () {
        Gate::authorize('isTechnician');
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('interventions', InterventionController::class);
});
