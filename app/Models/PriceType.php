<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    protected $table = 'price_types';

    public $timestamps = false;


    public function prices(): HasMany
    {
        return $this->hasMany(Price::class,);
    }

}
