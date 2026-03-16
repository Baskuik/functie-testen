<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabelResource\Pages;
use App\Models\Label;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use BackedEnum;

class LabelResource extends Resource
{
    protected static ?string $model = Label::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('label_name')
                            ->label('Label Naam')
                            ->required(),
                        Forms\Components\Toggle::make('label_active')
                            ->label('Actief')
                            ->onLabel('Ja')
                            ->offLabel('Nee')
                            ->default(true),
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
                    ->formatStateUsing(fn ($state): string => match (true) {
                        (bool) $state === true  => 'Ja',
                        (bool) $state === false => 'Nee',
                        default                 => 'Nog niet ingevuld',
                    })
                    ->badge()
                    ->color(fn ($state): string => match (true) {
                        (bool) $state === true  => 'success',
                        (bool) $state === false => 'danger',
                        default                 => 'gray',
                    }),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLabels::route('/'),
            'create' => Pages\CreateLabel::route('/create'),
            'edit'   => Pages\EditLabel::route('/{record}/edit'),
        ];
    }
}