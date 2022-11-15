<?php

namespace App\Models;

use Database\Factories\AccomodationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;

    public function location() {
        return $this->hasOne(Location::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }
}
