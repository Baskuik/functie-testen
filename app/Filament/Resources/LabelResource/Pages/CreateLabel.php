<?php

namespace App\Filament\Resources\LabelResource\Pages;

use App\Filament\Resources\LabelResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateLabel extends CreateRecord
{
    protected static string $resource = LabelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Automatisch wiki_id genereren op basis van label_name (als slug)
        $data['wiki_id'] = Str::slug($data['label_name']);

        // De overige velden worden NULL gelaten (nullable in de database):
        // conn_id, labelable_id, labelable_type, parent_id => NULL
        // label_position => default 0 (via migratie)
        // label_active   => default true (via migratie)

        return $data;
    }
}