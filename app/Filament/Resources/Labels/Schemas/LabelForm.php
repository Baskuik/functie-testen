<?php

namespace App\Filament\Resources\Labels\Schemas;

use Filament\Schemas\Schema;

class LabelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('label_active')
    ->label('Actief')
    ->options([
        'ja' => 'Ja',
        'nee' => 'Nee',
    ])
    ->default(null) // Hij staat standaard op leeg (null)
    ->placeholder('Maak een keuze'),
            ]);
    }
}
