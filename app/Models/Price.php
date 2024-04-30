<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['price_type_id', 'price', 'start_date', 'end_date'];

    protected $table = 'prices';

    public $timestamps = false;


    public function representations(): BelongsToMany
    {
        return $this->belongsToMany(Representation::class, "representation_reservation");
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PriceType::class, 'price_type_id');
    }

    public function scopeWithDistinctPrices(Builder $query)
    {
        return $query->distinct()->pluck('type');
    }
}
