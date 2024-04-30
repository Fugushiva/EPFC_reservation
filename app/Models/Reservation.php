<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'booking_date', 'status'];

    protected $table = 'reservations';

    public $timestamps = false;

    public function representationReservations(): HasMany
    {
        return $this->hasMany(RepresentationReservation::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function prices(): BelongsToMany
    {
        return $this->belongsToMany(Price::class, 'representation_reservation');
    }



}
