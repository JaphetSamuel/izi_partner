<?php

namespace App\Filament\Resources\DriverResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class DriverInfo extends Widget
{
    protected int | string | array $columnSpan = 2;

    protected static string $view = 'filament.resources.driver-resource.widgets.driver-info';

    public ?Model $record = null;
}
