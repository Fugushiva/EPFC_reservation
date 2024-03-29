<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Show extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'slug',
            'title',
            'description',
            'poster_url',
            'location_id',
            'bookable',
            'price',
            'created_at'
        ];

    const UPDATED_AT = null;

    public $timestamps = true;

    public function artistTypes(): BelongsToMany
    {
        return $this->belongsToMany(ArtistType::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function representations(): belongsTo
    {
        return $this->belongsTo(Representation::class);
    }


}
