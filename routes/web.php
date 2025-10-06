<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

/**
 * Admission Section
 */
// Online registration form (public)
Route::controller(RegistrationController::class)->group(function () {
    Route::get('/online-registration/create', 'create')
        ->name('online-registration.create');

    Route::get('/online-registration/{id}/pdf', 'downloadPdf')
        ->name('online-registration.pdf')
        ->whereNumber('id');

    // Uncomment the following line to enable the test route for sending registration emails
    // Route::get('/online-registration/mail', 'test')
    //     ->name('online-registration.mail');

    Route::post('/online-registration', 'store')
        ->name('online-registration.store');
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
