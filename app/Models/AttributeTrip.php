<?php

namespace App\Models;

use Database\Factories\AttributeTripFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTrip extends Model
{

    protected $fillable = ['attribute_id', 'trip_id'];

    protected $table = 'attribute_trip';
    use HasFactory;
}
