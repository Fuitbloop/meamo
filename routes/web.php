<?php

// routes/web.php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BookingController;
use Illuminate\Support\Facades\Route;

// User Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/schedules', [HomeController::class, 'schedules'])->name('schedules');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// User Booking Routes
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth:admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('services', ServiceController::class);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('bookings', AdminBookingController::class);

        Route::patch('/bookings/{booking}/status',
            [AdminBookingController::class, 'updateStatus']
        )->name('bookings.status');

        Route::post('/bookings/{booking}/send-result',
            [AdminBookingController::class, 'sendResult']
        )->name('bookings.send-result');

        Route::resource('galleries', GalleryController::class);
});

