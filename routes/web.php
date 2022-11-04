<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('index.index');

Route::get('/about', function() {
    return view('about');
})->name('about.index');

Route::get('/contact', function() {
    return view('contact');
})->name('contact.index');


// GET
Route::get('/reis', [App\Http\Controllers\LocationController::class, 'index'])->name('reis.index');
Route::get('/reis/{id}', [App\Http\Controllers\LocationController::class, 'show'])->name('reis.show')->whereNumber('id');

// POST
Route::get('/reis/create', [App\Http\Controllers\LocationController::class, 'create'])->name('reis.create');
Route::post('/reis', [App\Http\Controllers\LocationController::class, 'store'])->name('reis.store');

// PUT OR PATCH
Route::get('/reis/edit/{id}', [App\Http\Controllers\LocationController::class, 'edit'])->name('reis.edit');
Route::patch('/reis/{id}', [App\Http\Controllers\LocationController::class, 'update'])->name('reis.update');

// DELETE
Route::delete('/reis/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('reis.destroy');

//Route::resource('reis', App\Http\Controllers\LocationController::class);

// Route for invoke method
Route::get('/', [App\Http\Controllers\HomeController::class, '__invoke'])->name('index.index');

// Multiple HTTP verbs
//Route::match(['GET', 'POST'], '/reis', [App\Http\Controllers\LocationController::class,'index']);
//Route::any('/reis', [App\Http\Controllers\LocationController::class,'index']);

// Return view
//Route::view('/reis', 'reis.index', ['name'=> 'Code With Dary']);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
