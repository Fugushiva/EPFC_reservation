<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'price', 'start_date', 'end_date'];

    protected $table = 'prices';

    public $timestamps = false;


    public function representationReservation(): HasOne
    {
        return $this->hasOne(RepresentationReservation::class);
    }

    public function scopeWithDistinctPrices(Builder $query)
    {
        return $query->distinct()->pluck('type');
    }
}
