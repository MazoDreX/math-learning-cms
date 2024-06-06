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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\SoalResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SoalResource\RelationManagers;
use Filament\Forms\Components\MarkdownEditor;

class SoalResource extends Resource
{
    protected static ?string $model = Soal::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Tentukan Sub-bab')
                ->schema([
                    Select::make('subbab_id')
                    ->relationship('subbab', 'subbabJudul')
                    ->searchable(), 
                ]),
                
                Section::make('Buat Soal dan Jawaban')
                ->description('Bisa diisi dengan notasi LaTeX')
                ->schema([
                    MarkdownEditor::make('soal')
                        ->label('Soal')
                        ->required(),
                    Textarea::make('jawaban')
                        ->required()
                        ->label('Jawaban yang benar'),
                ]),


                Section::make('Opsi Pilihan Ganda')
                ->schema([
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
                ]),
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subbab.subbabJudul')
                ->sortable(),
                TextColumn::make('soal')
                ->words(10)
                ->label('Soal'),
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
