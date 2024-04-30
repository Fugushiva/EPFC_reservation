<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepresentationResource\Pages;
use App\Filament\Resources\RepresentationResource\RelationManagers;
use App\Models\Location;
use App\Models\Representation;
use App\Models\Show;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RepresentationResource extends Resource
{
    protected static ?string $model = Representation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('schedule')
                    ->required(),
                Forms\Components\Select::make('show_id')
                    ->label('show')
                    ->relationship('show')
                    ->options(Show::all()->pluck('title', 'id')),
                Forms\Components\Select::make('location_id')
                    ->label('location')
                    ->relationship('location')
                    ->options(Location::all()->pluck('designation', 'id')),
                Forms\Components\TextInput::make('prices.price')
                    ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('schedule'),
                Tables\Columns\TextColumn::make('location.designation'),
                Tables\Columns\TextColumn::make('prices.price'),
                Tables\Columns\TextColumn::make('prices.type')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRepresentations::route('/'),
            'create' => Pages\CreateRepresentation::route('/create'),
            'edit' => Pages\EditRepresentation::route('/{record}/edit'),
        ];
    }
}
