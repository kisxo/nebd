<?php

use App\Models\Registration;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/judges', function () {
    return Inertia::render('Judges');
})->name('judges');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');


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

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');


Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        // Dashboard page
        Route::get('/dashboard', function () {
            $total_registrations = Registration::count();
            return Inertia::render('Dashboard', [
                "total_registrations" => $total_registrations,
            ]);
        })->name('dashboard');

        // List all registrations
        Route::get('/registrations', [RegistrationController::class, 'schoolAdminIndex'])
            ->name('admin.registration');

        // Get a registration
        Route::get('/registrations/{id}', [RegistrationController::class, 'show'])
            ->name('admin.registration.detail')
            ->whereNumber('id'); // Only allow numeric IDs
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
