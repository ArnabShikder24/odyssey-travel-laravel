<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = 'package_id';

    protected $fillable = [
        'name',
        'details',
        'price',
        'img_url',
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'package_id', 'package_id');
    }

    public function flights()
    {
        return $this->hasMany(Flight::class, 'package_id', 'package_id');
    }

    public function tourGuides()
    {
        return $this->hasMany(TourGuide::class, 'package_id', 'package_id');
    }
}

