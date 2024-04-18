<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Show extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'title',
            'slug',
            'description',
            'poster_url',
            'location_id',
            'bookable',
            'duration',
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

    public function representations(): HasMany
    {
        return $this->hasMany(Representation::class);
    }

    public function artist():belongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function scopeWithTitle($query,$title)
    {
        if(!empty($title)){
            return $query->where('title', 'LIKE', "%{$title}%");
        }
        return $query;
    }

    public function scopeWithDuration($query, $duration)
    {
        if(!empty($duration)){
            return $query->where('duration', 'LIKE', "{$duration}");
        }
        return $query;
    }

    public function scopeIsBookable($query, $bookable)
    {
        if(!empty($bookable)){
            $bookableValue = $bookable == 'on' ? 1 : 0;
            return $query->where('bookable', $bookableValue);
        }
        return $query;
    }
}
