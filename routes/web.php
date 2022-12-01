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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
})->name('about.index');

Route::get('/contact', function() {
    return view('contact');
})->name('contact.index');
// Trips //

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



// LOCATIONS //

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



// DASHBOARD //
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('admin.index');

Route::get('/admin/settings', [App\Http\Controllers\DashboardSettingController::class, 'index'])->middleware(['auth'])->name('admin.setting.index');

Route::get('/admin/booking', [App\Http\Controllers\DashboardBookingController::class, 'index'])->middleware(['auth'])->name('admin.booking.index');

Route::get('/admin/trip', [App\Http\Controllers\DashboardTripController::class, 'index'])->middleware(['auth'])->name('admin.trip.index');

Route::get('/admin/location', [App\Http\Controllers\DashboardLocationController::class, 'index'])->middleware(['auth'])->name('admin.location.index');

Route::get('/admin/user', [App\Http\Controllers\DashboardUserController::class, 'index'])->middleware(['auth'])->name('admin.user.index');

//Route::get('/admin', function () {
//    return view('admin.index');
//})->middleware(['auth'])->name('admin.index');

Route::get('/admin/trips', function () {
    return view('admin.trips.index');
})->middleware(['auth'])->name('admin.trips.index');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['auth'])->name('user.index');

Route::get('/user/trips', [App\Http\Controllers\UserTripsController::class, 'index'])->middleware(['auth'])->name('user.trips');

Route::get('/user/account', [App\Http\Controllers\UserAccountController::class, 'index'])->middleware(['auth'])->name('user.account');

require __DIR__.'/auth.php';
