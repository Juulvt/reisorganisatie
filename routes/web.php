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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
