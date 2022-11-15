<?php

namespace App\Models;

use Database\Factories\AccomodationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;

    public function trip() {
        return $this->hasOne(Trip::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
