<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'booking_date', 'status'];

    protected $table = 'reservations';

    public $timestamps = false;

    public function representations(): BelongsToMany
    {
        return $this->belongsToMany(Representation::class, 'representation_reservation', 'reservation_id', 'representation_id');
    }
}
