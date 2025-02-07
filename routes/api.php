<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Create user route
Route::post('/user/create', [AuthController::class, 'createUser']);
// Get all users route
Route::get('/users', [AuthController::class, 'getAllUsers']);

// Create package route
Route::post('/package/create', [PackageController::class, 'createPack']);
// Get all packages route
Route::get('/packages', [PackageController::class, 'getAllPack']);
// Get package by ID route
Route::get('/package', [PackageController::class, 'getPackById']);
// Delete package by ID route
Route::delete('/package', [PackageController::class, 'deletePackById']);
// Update package route
Route::put('/package/update', [PackageController::class, 'updatePack']);

