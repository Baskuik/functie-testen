<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabelResource\Pages;
use App\Models\Label;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema; // We gebruiken Schema om de error te omzeilen
use BackedEnum;

class LabelResource extends Resource
{
    protected static ?string $model = Label::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    // We veranderen Form naar Schema zoals de error aangaf
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('label_name')
                            ->label('Label Naam')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label_name')->searchable(),
                Tables\Columns\TextColumn::make('label_active')
    ->label('Actief')
    ->formatStateUsing(fn (bool|null $state): string => match ($state) {
        true => 'Ja',
        false => 'Nee',
        null => 'Nog niet ingevuld',
    })
    ->badge() // Optioneel: maakt er een mooi labeltje van
    ->color(fn (bool|null $state): string => match ($state) {
        true => 'success',
        false => 'danger',
        null => 'gray',
    }),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLabels::route('/'),
            'create' => Pages\CreateLabel::route('/create'),
            'edit' => Pages\EditLabel::route('/{record}/edit'),
        ];
    }
}