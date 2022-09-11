<?php

namespace App\Filament\Resources\DriverResource\Widgets;

use App\Models\Driver;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class onlineDriver extends BaseWidget
{


    private function GetOnlineDriverCount() : int
    {
        $nombreDeDriverEnLigne = Driver::query()->where("is_online", true)->count();
        return $nombreDeDriverEnLigne;
    }

    protected function getCards(): array
    {
        return [
            Card::make("Conducteurs en ligne", $this->GetOnlineDriverCount())
            ->id("1")
        ];
    }
}
