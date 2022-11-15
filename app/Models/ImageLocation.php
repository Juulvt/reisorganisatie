<?php

namespace App\Models;

use Database\Factories\ImageLocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageLocation extends Model
{
    protected $table = 'image_location';
    use HasFactory;
}
