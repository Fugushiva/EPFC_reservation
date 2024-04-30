<?php

namespace App\Filament\Resources\PriceResource\RelationManagers;

use App\Models\Show;
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
                Forms\Components\Select::make('show')
                    ->options(Show::all()->pluck('title', 'id'))

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('show')
            ->columns([
                Tables\Columns\TextColumn::make('show.title'),
                Tables\Columns\TextColumn::make('schedule')
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
