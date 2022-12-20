<?php

namespace App\Models;

use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'country_id'];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function images() {
        return $this->belongsToMany(Image::class);
    }
}
