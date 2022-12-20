<?php

namespace App\Models;

use Database\Factories\ImageTripFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTrip extends Model
{

    protected $fillable = ['image_id', 'trip_id'];

    protected $table = 'image_trip';
    use HasFactory;
}
