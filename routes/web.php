<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\BookingController;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/services', [FrontController::class, 'services'])->name('services');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {

    Route::get('/booking', [FrontController::class, 'booking'])
        ->name('booking');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/dashboard',
    [AdminDashboardController::class,'index'])
    ->name('admin.dashboard');

    Route::view('/customers','admin.customers')
        ->name('customers');

    Route::get('/reports',
    [AdminDashboardController::class,'reports'])
    ->name('admin.reports');

});

Route::middleware(['auth'])->group(function(){

    Route::view('/user/dashboard','user.dashboard')
        ->name('user.dashboard');

    Route::view('/user/profile','user.profile')
        ->name('user.profile');

    Route::get('/user/bookings',
        [BookingController::class,'index'])
        ->name('user.bookings');

    Route::get('/user/history',
    [BookingController::class,'history'])
    ->name('user.history');

});

Route::prefix('services-admin')->middleware(['auth','role:admin'])->group(function () {

    Route::get('/', [ServiceController::class,'index'])
        ->name('services.admin');

    Route::get('/create', [ServiceController::class,'create'])
        ->name('services.admin.create');

    Route::post('/store', [ServiceController::class,'store'])
        ->name('services.admin.store');

    Route::get('/edit/{service}', [ServiceController::class,'edit'])
        ->name('services.admin.edit');

    Route::put('/update/{service}', [ServiceController::class,'update'])
        ->name('services.admin.update');

    Route::delete('/delete/{service}', [ServiceController::class,'destroy'])
        ->name('services.admin.destroy');

});

Route::middleware('auth')->group(function(){

    Route::get('/booking',[BookingController::class,'create'])
        ->name('booking');

    Route::post('/booking',[BookingController::class,'store'])
        ->name('booking.store');

});

Route::middleware(['auth','role:admin'])->group(function () {

    Route::get('/bookings-admin',
        [BookingController::class,'adminIndex'])
        ->name('admin.bookings');

    Route::put('/bookings-admin/update/{booking}',
        [BookingController::class,'update'])
        ->name('admin.bookings.update');
Route::delete('/bookings-admin/delete/{booking}',
    [BookingController::class,'destroy'])
    ->name('admin.bookings.destroy');
});