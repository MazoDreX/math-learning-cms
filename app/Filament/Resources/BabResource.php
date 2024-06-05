<?php

namespace App\Filament\Resources;

use App\Models\Bab;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BabResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BabResource\RelationManagers;

class BabResource extends Resource
{
    protected static ?string $model = Bab::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kelas')->options([
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                ]),
                TextInput::make('judul')->required(),
                TextInput::make('slug')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kelas')->sortable()->searchable(),
                TextColumn::make('judul')->searchable(),
                TextColumn::make('slug'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBabs::route('/'),
            'create' => Pages\CreateBab::route('/create'),
            'edit' => Pages\EditBab::route('/{record}/edit'),
        ];
    }
}
