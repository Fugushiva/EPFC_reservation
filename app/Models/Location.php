<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['slug','designation', 'address', 'locality_id', 'website', 'phone'];

    protected $table = 'locations';

    public $timestamps = false;

    public function shows():HasMany
    {
        return $this->hasMany(Show::class);
    }

    public function representation(): BelongsTo
    {
        return $this->belongsTo(Representation::class);
    }

    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class);
    }
}
