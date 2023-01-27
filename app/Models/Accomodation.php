<?php

namespace App\Models;

use Database\Factories\AccomodationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address', 'city', 'cost', 'min_amount_visitors', 'max_amount_visitors', 'location_id', 'type_id'];

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
