<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    use HasFactory;

    protected $table = 'tour_guides';
    
    protected $primaryKey = 'guide_id';

    // Mass-assignable fields
    protected $fillable = [
        'name',
        'location',
        'rating',
        'price',
    ];
}
