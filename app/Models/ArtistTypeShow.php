<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArtistTypeShow extends Model
{
    use HasFactory;

    protected $fillable = ['artist_type_id', 'show_id'];

    protected $table = 'artist_type_show';

    public $timestamps = false;


}
