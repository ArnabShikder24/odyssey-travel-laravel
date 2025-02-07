<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights'; // This is optional if your table name is the plural of the model name

    protected $primaryKey = 'flight_id'; // Optional if the primary key is `id`

    protected $fillable = [
        'flight_number',
        'seat_class',
        'departure_time',
        'arrival_time',
        'price',
    ];
}
