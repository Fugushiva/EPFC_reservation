<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RepresentationUser extends Model
{
    use HasFactory;

    protected $fillable = ['place'];

    protected $table = 'representation_user';

    public $timestamps = false;

    public function representations(): HasMany
    {
        return $this->hasMany(Representation::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
