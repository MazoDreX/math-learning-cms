<?php

namespace App\Filament\Resources\SubbabResource\Pages;

use App\Filament\Resources\SubbabResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubbabs extends ListRecords
{
    protected static string $resource = SubbabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
