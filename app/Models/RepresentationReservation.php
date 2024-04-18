<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RepresentationReservation extends Model
{
    use HasFactory;

    protected $fillable = ['representation_id', 'reservation_id','price_id', 'quantity'];

    protected $table = 'representation_reservation';

    public $timestamps = false;

    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    public function representations(): HasMany
    {
        return $this->hasMany(Representation::class);
    }
}
