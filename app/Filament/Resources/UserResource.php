<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Role;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('User Details')
                    ->tabs([
                        Tab::make('Personal Information')
                            ->schema([
                                TextInput::make('firstname')
                                    ->required()
                                    ->maxLength(60),
                                TextInput::make('lastname')
                                    ->required()
                                    ->maxLength(60),
                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->maxLength(255),
                            ]),
                        Tab::make('Account Settings')
                            ->schema([
                                TextInput::make('login')
                                    ->required()
                                    ->maxLength(60),
                                Select::make('role')
                                    ->multiple()
                                    ->relationship('roles', 'role')
                                    ->options(Role::all()->pluck('role', 'id'))
                                    ->rules('exists:roles,id'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('firstname')->searchable(),
                TextColumn::make('lastname')->searchable(),
                TextColumn::make('email')->searchable(),


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
            RelationManagers\ReservationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public function getTabs()
    {
        return [
            'all' => Tab::make('All users'),
        ];
    }
}
