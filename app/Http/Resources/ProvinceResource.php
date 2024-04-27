<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $postal_codes = $this->localities->pluck('postal_code', 'id');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'localities' => $postal_codes
        ];
    }
}
