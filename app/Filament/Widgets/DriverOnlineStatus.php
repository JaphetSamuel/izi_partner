<?php

namespace App\Filament\Widgets;

use App\Models\Driver;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class DriverOnlineStatus extends BaseWidget
{
    protected function getTablePollingInterval(): ?string
    {
        return "5s";
    }

    protected function getTableQuery(): Builder
    {
        return Driver::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('fullname')
            ->label('Conducteur'),
            Tables\Columns\BadgeColumn::make('is_online')
                ->enum([
                    0=>"Hors ligne",
                    1=>"En ligne"
                ])
                ->colors([
                    "danger"=>0,
                    "success"=>1
                ])
            ->label('Statut')
            ->sortable(),
        ];
    }
}
