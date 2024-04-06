<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'price', 'start_date', 'end_date'];

    protected $table = 'price';

    public $timestamps = false;


    public function representationReservation(): HasOne
    {
        return $this->hasOne(RepresentationReservation::class);
    }
}
