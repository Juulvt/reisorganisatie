<?php

namespace App\Models;

use App\Models\AttributeTrip;
use Database\Factories\TripFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function accomodation() {
        return $this->belongsTo(Accomodation::class);
    }

    public function attributes() {
        return $this->belongsToMany(Attribute::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
