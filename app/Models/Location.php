<?php

namespace App\Models;

use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function country() {
        return $this->hasOne(Country::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }
}
