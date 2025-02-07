<?php

// app/Models/Hotel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    // Define the table name (optional, as Laravel assumes 'hotels' for the plural)
    protected $table = 'hotels';

    protected $primaryKey = 'hotel_id';

    // Define the fillable properties (columns that can be mass-assigned)
    protected $fillable = [
        'hotel_name',
        'location',
        'price_per_night',
        'rating',
    ];

    // Optionally, you can define hidden attributes (e.g., for sensitive data)
    // protected $hidden = ['password'];
}

