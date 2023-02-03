<?php

namespace App\Models;

use App\Models\AttributeTrip;
use Database\Factories\TripFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'accomodation_id'];

    public function scopeFilter($query, $filters) {
        $query
        ->when($filters['country'] ?? false, fn ($query, $country) =>
            $query->whereHas('accomodation', fn ($query) =>
                $query->whereHas('location', fn ($query) =>
                    $query->whereHas('country', fn ($query) =>
                        $query->where('id', $country)))))
        ->when($filters['type'] ?? false, fn($query, $type) =>
            $query->whereHas('accomodation', fn ($query) =>
                $query->whereHas('type', fn ($query) =>
                    $query->where('id', $type))));
    }

    public function accomodation() {
        return $this->belongsTo(Accomodation::class);
    }

    public function reviews() {
        return $this->belongsTo(Review::class);
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
