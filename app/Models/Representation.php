<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = ['show_id', 'when', 'location_id'];

    protected $table = 'representations';

    public $timestamps = false;

    public function shows(): HasMany
    {
        return $this->hasMany(Show::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class, 'representation_reservation', 'representation_id', 'reservation_id');
    }


}
