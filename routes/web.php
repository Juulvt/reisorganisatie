<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// DASHBOARD //

// Dashboard Index //
// GET
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('admin.index');

// Dashboard bookings //
// GET
Route::get('/admin/booking', [App\Http\Controllers\DashboardBookingController::class, 'index'])->middleware(['auth'])->name('admin.booking.index');
Route::get('/admin/booking/{id}', [App\Http\Controllers\DashboardBookingController::class, 'show'])->name('admin.booking.show')->middleware(['auth'])->whereNumber('id');
// DELETE
Route::delete('/admin/booking/{id}', [App\Http\Controllers\DashboardBookingController::class, 'destroy'])->name('admin.booking.destroy');

// Dashboard trips //
// GET
Route::get('/admin/trip', [App\Http\Controllers\DashboardTripController::class, 'index'])->middleware(['auth'])->name('admin.trip.index');
Route::get('/admin/trip/{id}', [App\Http\Controllers\DashboardTripController::class, 'show'])->name('admin.trip.show')->middleware(['auth'])->whereNumber('id');
// POST
Route::get('/admin/trip/create', [App\Http\Controllers\DashboardTripController::class, 'create'])->middleware(['auth'])->name('admin.trip.create');
Route::post('/admin/trip', [App\Http\Controllers\DashboardTripController::class, 'store'])->name('admin.trip.store');
// PUT OR PATCH
Route::get('/admin/trip/edit/{id}', [App\Http\Controllers\DashboardTripController::class, 'edit'])->middleware(['auth'])->name('admin.trip.edit');
Route::patch('/admin/trip/{id}', [App\Http\Controllers\DashboardTripController::class, 'update'])->middleware(['auth'])->name('admin.trip.update');
// DELETE
Route::delete('/admin/trip/{id}', [App\Http\Controllers\DashboardTripController::class, 'destroy'])->name('admin.trip.destroy');

// Dashboard location //
// GET
Route::get('/admin/location', [App\Http\Controllers\DashboardLocationController::class, 'index'])->middleware(['auth'])->name('admin.location.index');
Route::get('/admin/location/{id}', [App\Http\Controllers\DashboardLocationController::class, 'show'])->name('admin.location.show')->middleware(['auth'])->whereNumber('id');
// POST
Route::get('/admin/location/create', [App\Http\Controllers\DashboardLocationController::class, 'create'])->middleware(['auth'])->name('admin.location.create');
Route::post('/admin/location', [App\Http\Controllers\DashboardLocationController::class, 'store'])->name('admin.location.store');
// PUT OR PATCH
Route::get('/admin/location/edit/{id}', [App\Http\Controllers\DashboardLocationController::class, 'edit'])->middleware(['auth'])->name('admin.location.edit');
Route::patch('/admin/location/{id}', [App\Http\Controllers\DashboardLocationController::class, 'update'])->middleware(['auth'])->name('admin.location.update');
// DELETE
Route::delete('/admin/location/{id}', [App\Http\Controllers\DashboardLocationController::class, 'destroy'])->name('admin.location.destroy');

// Dashboard country //
// POST
Route::get('/admin/location/country/create', [App\Http\Controllers\DashboardCountryController::class, 'create'])->middleware(['auth'])->name('admin.country.create');
Route::post('/admin/country', [App\Http\Controllers\DashboardCountryController::class, 'store'])->name('admin.country.store');
// DELETE
Route::delete('/admin/country/{id}', [App\Http\Controllers\DashboardCountryController::class, 'destroy'])->name('admin.country.destroy');

//dashboard user //
// GET
Route::get('/admin/user', [App\Http\Controllers\DashboardUserController::class, 'index'])->middleware(['auth'])->name('admin.user.index');
Route::get('/admin/user/{id}', [App\Http\Controllers\DashboardUserController::class, 'show'])->name('admin.user.show')->middleware(['auth'])->whereNumber('id');
// POST
Route::get('/admin/user/create', [App\Http\Controllers\DashboardUserController::class, 'create'])->middleware(['auth'])->name('admin.user.create');
Route::post('/admin/user', [App\Http\Controllers\DashboardUserController::class, 'store'])->name('admin.user.store');
// PUT OR PATCH
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\DashboardUserController::class, 'edit'])->middleware(['auth'])->name('admin.user.edit');
Route::patch('/admin/user/{id}', [App\Http\Controllers\DashboardUserController::class, 'update'])->middleware(['auth'])->name('admin.user.update');
// DELETE
Route::delete('/admin/user/{id}', [App\Http\Controllers\DashboardUserController::class, 'destroy'])->name('admin.user.destroy');

// Dashboard settings //
// PUT OR PATCH
Route::get('/admin/settings/contact', [App\Http\Controllers\DashboardContactController::class, 'edit'])->middleware(['auth'])->name('admin.setting.contact');
Route::get('/admin/settings/about', [App\Http\Controllers\DashboardAboutController::class, 'edit'])->middleware(['auth'])->name('admin.setting.about');
Route::patch('/admin/settings/about', [App\Http\Controllers\DashboardAboutController::class, 'update'])->middleware(['auth'])->name('admin.setting.updateabout');
Route::get('/admin/settings/privacyterms', [App\Http\Controllers\DashboardSettingController::class, 'edit'])->middleware(['auth'])->name('admin.setting.privacy');


// Visitor pages //

// About
// GET
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

// Contact
// GET
Route::get('/contact', [App\Http\Controllers\AboutController::class, 'index'])->name('contact.index');

// Privacy
// GET
Route::get('/privacy', [App\Http\Controllers\AboutController::class, 'index'])->name('privacy.index');

// Terms & Conditions
// GET
Route::get('/terms', [App\Http\Controllers\AboutController::class, 'index'])->name('terms.index');

// Trips 
// GET
Route::get('/', [App\Http\Controllers\TripController::class, 'index'])->name('index.index');
Route::get('/{id}', [App\Http\Controllers\TripController::class, 'show'])->name('index.show')->whereNumber('id');
// POST
Route::get('/create', [App\Http\Controllers\TripController::class, 'create'])->name('index.create');
Route::post('/', [App\Http\Controllers\TripController::class, 'store'])->name('index.store');
// PUT OR PATCH
Route::get('/edit/{id}', [App\Http\Controllers\TripController::class, 'edit'])->name('index.edit');
Route::patch('/{id}', [App\Http\Controllers\TripController::class, 'update'])->name('index.update');
// DELETE
Route::delete('/{id}', [App\Http\Controllers\TripController::class, 'destroy'])->name('index.destroy');

// LOCATIONS
// GET
Route::get('/location', [App\Http\Controllers\LocationController::class, 'index'])->name('location.index');
Route::get('/location/{id}', [App\Http\Controllers\LocationController::class, 'show'])->name('location.show')->whereNumber('id');
// POST
Route::get('/location/create', [App\Http\Controllers\LocationController::class, 'create'])->name('location.create');
Route::post('/location', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');
// PUT OR PATCH
Route::get('/location/edit/{id}', [App\Http\Controllers\LocationController::class, 'edit'])->name('location.edit');
Route::patch('/location/{id}', [App\Http\Controllers\LocationController::class, 'update'])->name('location.update');
// DELETE
Route::delete('/location/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('location.destroy');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['auth'])->name('user.index');

Route::get('/user/trips', [App\Http\Controllers\UserTripsController::class, 'index'])->middleware(['auth'])->name('user.trips');

Route::get('/user/account', [App\Http\Controllers\UserAccountController::class, 'index'])->middleware(['auth'])->name('user.account');

require __DIR__.'/auth.php';
