<?php

namespace App\Models;

use Database\Factories\ImageLocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageLocation extends Model
{
    
    protected $fillable = ['image_id', 'location_id'];

    protected $table = 'image_location';
    use HasFactory;
}
