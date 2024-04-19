<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class RepresentationUser extends Model implements Feedable
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

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->show->title)
            ->summary($this->show->description)
            ->updated(Carbon::now())
            // updated ($this->updated_at)//TODO ajouter au model et migrer
            ->link(route('reprensentation.show', $this->id))
            ->authorName('Jérôme') // changer dans les variable env APP_AUTHOR'
             ->authorEmail('jeromedelodder@gmail.com');
    }

    public static function getFeedItems()
    {
        return Representation::all(); //todo rep de ce mois
    }
}
