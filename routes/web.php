<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PUBLIC ROUTES ---

// FIX 1: The single, definitive homepage route.
Route::get('/', function () {
    return view('home');
})->name('home');

// BEST PRACTICE: If you still want '/home' to work, redirect it to '/'.
// This avoids duplicate content and route name collisions.
Route::redirect('/home', '/');


// --- AUTHENTICATED ROUTES ---

// BEST PRACTICE: Group all authenticated routes under a single middleware group.
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // A generic dashboard for verified users. This can act as a simple landing
    // page or contain logic to redirect users based on their role.
    // Route::get('/dashboard', function () {
    //     // You could add redirect logic here, or just show a simple view.
    //     return 'You are logged in and verified!';
    // })->name('dashboard');

    Route::view('/profile/edit', 'profile.edit')->name('profile.edit');
    Route::view('/profile/password', 'profile.password')->name('profile.password');

    // Group for Customers
    // The 'verified' middleware is inherited from the parent group.
    Route::prefix('customer')->middleware('role:customer')->name('customer.')->group(function () {
        Route::get('/welcome', function () {
            return view('customer.welcome');
        })->name('welcome');
    });


    // Group for Admin
    // FIX 2: Corrected role hierarchy. A 'superadmin' can now access these routes.
    Route::prefix('admin')->middleware('role:admin|superadmin')->name('admin.')->group(function () {
        Route::get('/dashboard/admin', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        // Add other admin routes here
    });


    // Group for Super Admin (Superadmin Only)
    Route::prefix('superadmin')->middleware('role:superadmin')->name('superadmin.')->group(function () {
        Route::get('/dashboard/superadmin', function () {
            return view('superadmin.dashboard');
        })->name('dashboard');
        // Add other superadmin-only routes here
    });
});
