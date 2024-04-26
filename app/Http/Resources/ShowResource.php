<?php

namespace App\Http\Resources;

use App\Models\Artist;
use App\Models\ArtistType;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {

        $artistTypes = $this->artistTypes->map(function ($artistType) {
            return [
                $artistType->type->type,
                $artistType->artist->firstname,
                $artistType->artist->lastname,
            ];
        });





        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'bookable' => $this->bookable === 1 ? "yes" : "no",
            'duration' => $this->duration . ' minutes',
            'types' => $artistTypes,
        ];
    }
}
