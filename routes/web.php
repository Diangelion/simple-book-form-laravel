<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return redirect()->route('bookings.index');
});

Route::resource('bookings', BookingController::class);