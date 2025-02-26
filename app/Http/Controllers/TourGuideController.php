<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourGuide;

class TourGuideController extends Controller
{
    // Create a new Tour Guide
    public function createTourGuide(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'price' => 'required|numeric',
            'package_id' => 'nullable|exists:packages,package_id'
        ]);

        $tourGuide = TourGuide::create($request->all());

        return response()->json(['message' => 'Tour Guide created successfully', 'data' => $tourGuide], 201);
    }

    // Get all Tour Guides
    public function getAllTourGuides()
    {
        $tourGuides = TourGuide::all();
        return response()->json($tourGuides, 200);
    }

     // Get TourGuide by package ID
    public function getTourGuideByPackage($package_id)
    {
        $tourGuides = TourGuide::where('package_id', $package_id)->get();

        if ($tourGuides->isEmpty()) {
            return response()->json([
                'message' => 'No tourGuides found for this package'
            ], 404);
        }

        return response()->json($tourGuides, 200);
    }

    // Get Tour Guide by ID
    public function getTourGuideById($guide_id)
    {
        $tourGuide = TourGuide::find($guide_id);

        if (!$tourGuide) {
            return response()->json(['message' => 'Tour Guide not found'], 404);
        }

        return response()->json(['message' => 'Tour Guide fetched successfully', 'data' => $tourGuide], 200);
    }

    // Delete Tour Guide by ID
    public function deleteTourGuideById($guide_id)
    {
        $tourGuide = TourGuide::find($guide_id);

        if (!$tourGuide) {
            return response()->json(['message' => 'Tour Guide not found'], 404);
        }

        $tourGuide->delete();
        return response()->json(['message' => 'Tour Guide deleted successfully'], 200);
    }
}

