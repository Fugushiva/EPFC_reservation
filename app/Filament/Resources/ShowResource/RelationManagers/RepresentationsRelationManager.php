<?php

namespace App\Filament\Resources\ShowResource\RelationManagers;

use App\Models\Location;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RepresentationsRelationManager extends RelationManager
{
    protected static string $relationship = 'representations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('schedule')
                    ->required(),
                Forms\Components\Select::make('location_id')
                    ->label('designation')
                    ->options(Location::all()->pluck('designation', 'id')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('representations')
            ->columns([
                Tables\Columns\TextColumn::make('schedule'),
                Tables\Columns\TextColumn::make('location.designation')

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
