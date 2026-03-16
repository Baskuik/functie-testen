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
    
        // Zorg dat label_active altijd een boolean waarde heeft
        $data['label_active'] = $data['label_active'] ?? true;
    
        return $data;
    }
}