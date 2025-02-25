<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    // Create a new hotel
    public function create(Request $request)
    {
        $request->validate([
            'hotel_name' => 'required|string',
            'location' => 'required|string',
            'price_per_night' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:5',
            'package_id' => 'nullable|exists:packages,package_id'
        ]);

        $hotel = new Hotel();
        $hotel->hotel_name = $request->hotel_name;
        $hotel->location = $request->location;
        $hotel->price_per_night = $request->price_per_night;
        $hotel->rating = $request->rating;
        $hotel->package_id = $request->package_id;
        $hotel->save();

        return response()->json([
            'message' => 'Hotel created successfully',
            'hotel' => $hotel
        ], 201);
    }

    // Get all hotels
    public function getAll()
    {
        $hotels = Hotel::all();

        return response()->json([
            'hotels' => $hotels
        ]);
    }

    // Get a hotel by ID
    public function getById($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);

        if (!$hotel) {
            return response()->json([
                'message' => 'Hotel not found'
            ], 404);
        }

        return response()->json([
            'hotel' => $hotel
        ]);
    }

    // Delete a hotel by ID
    public function deleteById($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);

        if (!$hotel) {
            return response()->json([
                'message' => 'Hotel not found'
            ], 404);
        }

        $hotel->delete();

        return response()->json([
            'message' => 'Hotel deleted successfully'
        ]);
    }
}
