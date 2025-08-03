<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::latest()->get();
        return view('index', compact('bookings'));
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'booking_date' => 'required|date',
        ]);


        Booking::create($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil ditambahkan.');
    }

    public function edit(Booking $booking) {
        $bookings = Booking::latest()->get();
        return view('index', compact('bookings', 'booking'));
    }

    public function update(Request $request, Booking $booking) {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'booking_date' => 'required|date',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking) {
        $booking->delete();

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil dihapus.');
    }
}
