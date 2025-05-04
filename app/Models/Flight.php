<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $primaryKey = 'flight_id';

    protected $fillable = [
        'flight_number',
        'seat_class',
        'departure_time',
        'arrival_time',
        'price',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'package_id');
    }
}
