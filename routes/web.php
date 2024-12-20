<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TableController;
// use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/success', function () {
    return redirect()->route('bookings.index')->with('success', 'Pago exitoso y reserva creada.');
})->name('success');

Route::get('/live', function () {
    return response()->json(['datetime' => now()->toDateTimeString()], 200);
})->name('live');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/home', function () { return view('home'); })->name('home');
    Route::get('{resource}/table', [TableController::class, 'showTable']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('activities', ActivityController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('bookings', BookingController::class);
});


require __DIR__.'/auth.php';
