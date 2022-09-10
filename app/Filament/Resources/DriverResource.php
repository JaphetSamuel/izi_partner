<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
use App\Models\Driver;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DriverResource extends Resource
{
    protected static ?string $model = Driver::class;


    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('firstname')
                ->label("Nom")
                ->required(),
                Forms\Components\TextInput::make('lastname')
                ->label("Prenom")
                ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label("Contact")
                    ->tel()
                    ->required()
                    ->maxLength(191),

                Forms\Components\TextInput::make('email')
                    ->label('adresse mail')
                ->email(),

                Forms\Components\TextInput::make('password')
                    ->dehydrateStateUsing(fn($state)=>password_hash($state, PASSWORD_ARGON2ID,[ 'time_cost' => 1, 'threads' => 2]))
                ->label("Mot de passe")
                ->password()
                ->visibleOn(["edit"]),

                Forms\Components\FileUpload::make('picture')
                ->label("Photo"),

                Forms\Components\Toggle::make('is_enabled')
                ->label("activé")
                ->visibleOn(["view"]),
                Forms\Components\TextInput::make('car_brand')
                ->label("Marque du Véhicule"),

                Forms\Components\TextInput::make('car_model')
                ->label("Model du vehicule"),
                Forms\Components\TextInput::make('immatriculation'),

                Forms\Components\TextInput::make('car_number'),
                Forms\Components\FileUpload::make('car_licence')
                ->label("Permis de conduire"),

                Forms\Components\FileUpload::make('photos')
                ->label("photos du véhicule")
                ->multiple(),
                Forms\Components\FileUpload::make('gray_card')
                    ->label("Carte Grise"),
                Forms\Components\FileUpload::make('insurance_card')
                    ->label("Assurance"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make(''),
                Tables\Columns\TextColumn::make('fullname')
                    ->searchable(['firstname','lastname'])
                ->label('Nom'),
                Tables\Columns\TextColumn::make('phone')
                ->label('Contact'),


                Tables\Columns\BooleanColumn::make('is_online')
                ->label('En ligne'),
                Tables\Columns\TextColumn::make('classification')
                    ->label('classe')
                    ->sortable()
                ->enum([
                        "base"=>"ECO",
                        "share"=>"PREMIUM",
                        "private"=>'LUXE'
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDrivers::route('/'),
            'create' => Pages\CreateDriver::route('/create'),
            'view' => Pages\ViewDriver::route('/{record}'),
            'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}
