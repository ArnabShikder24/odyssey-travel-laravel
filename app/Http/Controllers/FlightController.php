<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    // Create flight
    public function createFlight(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|string',
            'seat_class' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|numeric',
            'package_id' => 'nullable|exists:packages,package_id'
        ]);

        $flight = new Flight();
        $flight->flight_number = $request->flight_number;
        $flight->seat_class = $request->seat_class;
        $flight->departure_time = $request->departure_time;
        $flight->arrival_time = $request->arrival_time;
        $flight->price = $request->price;
        $flight->package_id = $request->package_id;
        $flight->save();

        return response()->json(['message' => 'Flight created successfully'], 201);
    }

    // Get all flights
    public function getAllFlights()
    {
        $flights = Flight::all();
        return response()->json($flights, 200);
    }

    // Get flight by ID
    public function getFlightById(Request $request)
    {
        $flight = Flight::find($request->flight_id);

        if (!$flight) {
            return response()->json(['message' => 'Flight not found'], 404);
        }

        return response()->json(['message' => 'Flight fetched successfully', 'data' => $flight], 200);
    }

    // Delete flight by ID
    public function deleteFlightById(Request $request)
    {
        $flight = Flight::find($request->flight_id);

        if (!$flight) {
            return response()->json(['message' => 'Flight not found'], 404);
        }

        $flight->delete();
        return response()->json(['message' => 'Flight deleted successfully'], 200);
    }
}
