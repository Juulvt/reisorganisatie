<?php

namespace App\Models;

use Database\Factories\ImageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_path', 'order'];

    public function trips() {
        return $this->belongsToMany(Trip::class);
    }

    public function locations() {
        return $this->belongsToMany(Location::class);
    }
}
