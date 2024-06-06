<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubbabResource\Pages;
use App\Filament\Resources\SubbabResource\RelationManagers;
use App\Models\Subbab;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubbabResource extends Resource
{
    protected static ?string $model = Subbab::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
    return $form
            ->schema([
                Section::make('Membuat Judul Sub-bab')
                ->description('Tentukan bab dan Buat judul sub-bab')
                ->schema([
                    Select::make('bab_id')
                        ->relationship('bab', 'judul')
                        ->searchable(), 
                    TextInput::make('subbabJudul')
                        ->label('Judul Sub-bab')
                        ->required(),
                    
                ])->columns(1),
                Section::make('Membuat Konten atau Isi Sub-bab')
                ->description('Bisa diisikan dengan format LaTeX untuk membuat notasi matematika')
                ->schema([
                    MarkdownEditor::make('subbabIsi')
                        ->required()
                        ->label('Isi Sub-bab')
                        ->columnSpanFull(),
                    
                ]),
                Section::make('Meta')
                ->description('Kebutuhan nama URL (Slug) dan Tag isi sub-bab')
                ->schema([
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    TagsInput::make('tags')
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bab.judul')
                    ->sortable(),
                TextColumn::make('subbabJudul'),
                TextColumn::make('slug'),
                TextColumn::make('tags'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSubbabs::route('/'),
            'create' => Pages\CreateSubbab::route('/create'),
            'edit' => Pages\EditSubbab::route('/{record}/edit'),
        ];
    }
}
