<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\BookingController;

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
Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::post('/getUserByEmail', [AuthController::class, 'getUserByEmail']);
Route::post('/auth/{id}/assign-role', [AuthController::class, 'assignRole']);

// Create package route
Route::post('/package/create', [PackageController::class, 'createPack']);
Route::get('/packages', [PackageController::class, 'getAllPack']);
Route::get('/package', [PackageController::class, 'getPackById']);
Route::delete('/package', [PackageController::class, 'deletePackById']);
Route::put('/package/update', [PackageController::class, 'updatePack']);

// Create hotel route
Route::post('/hotel/create', [HotelController::class, 'create']);
Route::get('/hotels', [HotelController::class, 'getAll']);
Route::get('/hotels/package/{package_id}', [HotelController::class, 'getHotelsByPackage']);
Route::get('/hotel/{hotel_id}', [HotelController::class, 'getById']);
Route::delete('/hotel/{hotel_id}', [HotelController::class, 'deleteById']);

// Create flight route
Route::post('flight/create', [FlightController::class, 'createFlight']);
Route::get('flights', [FlightController::class, 'getAllFlights']);
Route::get('/flights/package/{package_id}', [FlightController::class, 'getFlightsByPackage']);
Route::get('flight', [FlightController::class, 'getFlightById']);
Route::delete('flight', [FlightController::class, 'deleteFlightById']);

// Create tour guide route
Route::post('/tour-guide/create', [TourGuideController::class, 'createTourGuide']);
Route::get('/tour-guide/all', [TourGuideController::class, 'getAllTourGuides']);
Route::get('/tour-guide/package/{package_id}', [TourGuideController::class, 'getTourGuideByPackage']);
Route::get('/tour-guide/{guide_id}', [TourGuideController::class, 'getTourGuideById']);
Route::delete('/tour-guide/{guide_id}', [TourGuideController::class, 'deleteTourGuideById']);

// Create booking route
Route::post('/booking/create', [BookingController::class, 'createBooking']);
Route::get('/bookings', [BookingController::class, 'getAllBookings']);
Route::get('/bookings/email/{email}', [BookingController::class, 'getBookingsByEmail']);


