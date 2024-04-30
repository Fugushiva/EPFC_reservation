<?php

namespace App\Filament\Resources\RepresentationResource\Pages;

use App\Filament\Resources\RepresentationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRepresentations extends ListRecords
{
    protected static string $resource = RepresentationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
