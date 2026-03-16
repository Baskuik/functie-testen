<?php

namespace App\Filament\Resources; // Teruggezet naar de standaard namespace

use BackedEnum;
use App\Filament\Resources\LabelResource\Pages;
use App\Models\Label;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class LabelResource extends Resource
{

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $model = Label::class;

    public static function form(Form $form): Form
    {
        return $form 
            ->schema([
                Forms\Components\Section::make() // Card is in v3/v5 vaak Section
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
                Tables\Columns\TextColumn::make('label_name')
                    ->label('Naam')
                    ->searchable(),
                Tables\Columns\IconColumn::make('label_active')
                    ->label('Actief')
                    ->boolean(),
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
        return [];
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