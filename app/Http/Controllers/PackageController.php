<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    // Create package
    public function createPack(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric',
            'img_url' => 'nullable|string|url',
        ]);

        try {
            $package = Package::create([
                'name' => $request->name,
                'details' => $request->details,
                'price' => (float) $request->price,
                'img_url' => $request->img_url,
            ]);

            return response()->json(['message' => 'Package created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create Package', 'error' => $e->getMessage()], 500);
        }
    }

    // Get all packages
    public function getAllPack()
    {
        try {
            $packages = Package::all();
            return response()->json($packages, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch packages', 'error' => $e->getMessage()], 500);
        }
    }

    // Get package by ID
    public function getPackById(Request $request)
    {
        $package_id = $request->query('package_id');
        
        try {
            $package = Package::find($package_id);

            if (!$package) {
                return response()->json(['message' => 'Package not found'], 404);
            }

            return response()->json(['message' => 'Package fetched successfully', 'data' => $package], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch Package', 'error' => $e->getMessage()], 500);
        }
    }

    // Delete package by ID
    public function deletePackById(Request $request)
    {
        $package_id = $request->query('package_id');

        try {
            $package = Package::find($package_id);

            if (!$package) {
                return response()->json(['message' => 'Package not found'], 404);
            }

            $package->delete();

            return response()->json(['message' => 'Package deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete Package', 'error' => $e->getMessage()], 500);
        }
    }

    // Update package
    public function updatePack(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,package_id',
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric',
            'img_url' => 'nullable|string|url',
        ]);

        $package = Package::find($request->package_id);

        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }

        try {
            $package->update([
                'name' => $request->name,
                'details' => $request->details,
                'price' => (float) $request->price,
                'img_url' => $request->img_url,
            ]);

            return response()->json(['message' => 'Package updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update Package', 'error' => $e->getMessage()], 500);
        }
    }
}

