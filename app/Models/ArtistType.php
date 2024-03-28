<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ArtistType extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'type_id'];

    protected $table = 'artist_type';

    public $timestamps = false;
}
