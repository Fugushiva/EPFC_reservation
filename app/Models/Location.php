<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['slug','designation', 'address', 'locality_id', 'website', 'phone', 'picture_url'];

    protected $table = 'locations';

    public $timestamps = false;

    public function shows():HasMany
    {
        return $this->hasMany(Show::class);
    }

    public function representation(): HasOne
    {
        return $this->hasOne(Representation::class);
    }

    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class);
    }

    public function scopeWithDesignation($query ,$designation)
    {
        if(!empty($designation)){
            return $query->where('designation', 'LIKE', "%{$designation}%");
        }
        return $query;
    }

    public function scopeWithAddress($query, $address)
    {
        if(!empty($address)){
            return $query->where('address', 'LIKE', "%{$address}%");
        }
        return $query;
    }

    public function scopeWithPostcode($query, $postcode)
    {
        if(!empty($postcode)) {
            return $query->where('address', 'regexp', ".*,\s*" . $postcode . "\s+[a-zA-Z].*");
        }
        return $query;
    }

}
