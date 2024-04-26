<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class ArtistType extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'type_id'];

    protected $table = 'artist_types';

    public $timestamps = false;

    public function shows():BelongsToMany
    {
        return $this->belongsToMany(Show::class);
    }


}
