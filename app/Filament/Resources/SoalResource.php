<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Soal;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SoalResource\Pages;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SoalResource\RelationManagers;

class SoalResource extends Resource
{
    protected static ?string $model = Soal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('subbab_id'), //BELUM DIATUR (PLACE HOLDER)
                Textarea::make('soal')
                    ->label('Soal')
                    ->required(),
                Textarea::make('jawaban')
                    ->required()
                    ->label('Jawaban yang benar'),
                Textarea::make('option_a')
                    ->label('Opsi A')
                    ->required(),
                Textarea::make('option_b')
                    ->label('Opsi B')
                    ->required(),
                Textarea::make('option_c')
                    ->label('Opsi C')
                    ->required(),
                Textarea::make('option_d')
                    ->label('Opsi D')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subbab_id')->label('Subbab ID'),
                TextColumn::make('soal')->label('Soal'),
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
            'index' => Pages\ListSoals::route('/'),
            'create' => Pages\CreateSoal::route('/create'),
            'edit' => Pages\EditSoal::route('/{record}/edit'),
        ];
    }
}
