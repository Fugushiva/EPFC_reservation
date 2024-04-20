<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Representation extends Model implements Feedable
{
    use HasFactory;

    protected $fillable = ['show_id', 'schedule', 'location_id'];

    protected $table = 'representations';

    public $timestamps = false;

    public function show(): BelongsTo
    {
        return $this->belongsTo(Show::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function representationReservations(): HasMany
    {
        return $this->hasMany(RepresentationReservation::class);
    }
    public function prices(): BelongsToMany
    {
        return $this->belongsToMany(Price::class, 'representation_reservation');
    }



    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->show->title)
            ->summary($this->show->description)
            ->updated(Carbon::now())
            // updated ($this->updated_at)//TODO ajouter au model et migrer
            ->link(route('representation.show', $this->id))
            ->authorName('Jérôme') // changer dans les variable env APP_AUTHOR'
            ->authorEmail('jeromedelodder@gmail.com');
    }

    public static function getFeedItems()
    {
        return Representation::all(); //todo rep de ce mois
    }


}
