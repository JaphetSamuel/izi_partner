<?php

namespace App\Filament\Resources\DriverResource\Pages;

use App\Filament\Resources\DriverResource;
use App\Models\Driver;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDriver extends ViewRecord
{
    protected static string $resource = DriverResource::class;

    public $record ;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make("buyPack")
            ->label("Acheter un pack ")
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DriverResource\Widgets\DriverInfo::class
        ];
    }
}
