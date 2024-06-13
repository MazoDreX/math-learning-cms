<?php

namespace App\Filament\Widgets;

use App\Models\Bab;
use App\Models\Soal;
use App\Models\Subbab;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class JumlahBab extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Bab', Bab::count()),
            Stat::make('Jumlah Sub-bab', Subbab::count()),
            Stat::make('Jumlah Soal', Soal::count())
        ];
    }
}
