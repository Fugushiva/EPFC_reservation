<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ArtistType extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'type_id'];

    protected $table = 'artist_types';

    public $timestamps = false;


    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function artist(): belongsTo
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

}
