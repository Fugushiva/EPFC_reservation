<?php

namespace App\Filament\Resources\ShowResource\RelationManagers;

use App\Models\Artist;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtistsRelationManager extends RelationManager
{
    protected static string $relationship = 'ArtistTypes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('artist_id')
                    ->relationship('artist')
                    ->options(
                        Artist::all()->mapWithKeys(function ($artist) {
                            return [$artist->id => $artist->firstname . ' ' . $artist->lastname];
                        })),
                Forms\Components\Select::make('type_id')
                    ->relationship('type')
                    ->options(Type::all()->pluck('type', 'id'))

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Artist')
            ->columns([
                Tables\Columns\TextColumn::make('artist.firstname')->label('firstname'),
                Tables\Columns\TextColumn::make('artist.lastname')->label('lastname'),
                Tables\Columns\TextColumn::make('type.type')->label('type'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
