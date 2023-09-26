<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Profile;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('cars.index');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/cars', App\Http\Controllers\CarController::class);
Route::resource('/bookings', App\Http\Controllers\BookingController::class);
Route::resource('/profiles', App\Http\Controllers\ProfileController::class);


