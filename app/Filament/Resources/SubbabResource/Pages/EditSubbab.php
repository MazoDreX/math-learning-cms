<?php

namespace App\Filament\Resources\SubbabResource\Pages;

use App\Filament\Resources\SubbabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubbab extends EditRecord
{
    protected static string $resource = SubbabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
