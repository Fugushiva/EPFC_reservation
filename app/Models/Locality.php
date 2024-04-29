<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = ['name','postal_code', 'province_id'];

    protected $table = 'localities';

    public $timestamps = false;

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function location(): HasOne
    {
        return $this->hasOne(Location::class);
    }

}
