<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'flight_id',
        'hotel_id',
        'guide_id',
        'person',
        'subtotal',
        'package_id',
        'email',
        'payment_date',
        'status',
    ];

    // Relationships
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'flight_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }
    
    public function tourGuides()
    {
        return $this->hasMany(TourGuide::class, 'guide_id', 'guide_id');
    }
}

