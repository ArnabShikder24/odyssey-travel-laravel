<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Create Booking
    public function createBooking(Request $request)
    {
        $request->validate([
            'flight_id' => 'nullable|exists:flights,flight_id',
            'hotel_id' => 'nullable|exists:hotels,hotel_id',
            'guide_id' => 'nullable|exists:tour_guides,guide_id',
            'person' => 'required|integer|min:1',
            'subtotal' => 'required|numeric',
            'package_id' => 'required|exists:packages,package_id',
            'email' => 'required|email',
            'payment_date' => 'required|date',
            'status' => 'required|in:paid,unpaid,cancelled',
        ]);

        $data = $request->all();
        // ✅ Convert ISO string to MySQL datetime
        $data['payment_date'] = date('Y-m-d H:i:s', strtotime($data['payment_date']));

        $booking = Booking::create($data);

        return response()->json(['message' => 'Booking created successfully', 'data' => $booking], 201);
    }

    // Get all bookings
    public function getAllBookings()
    {
        $bookings = Booking::all();
        return response()->json($bookings, 200);
    }

    // Get bookings by email
    public function getBookingsByEmail($email)
    {
        $bookings = Booking::where('email', $email)->get();

        if ($bookings->isEmpty()) {
            return response()->json(['message' => 'No bookings found for this email'], 404);
        }

        return response()->json($bookings, 200);
    }
}

