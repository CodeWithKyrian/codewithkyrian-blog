<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Exports\PostExporter;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExportAction::make()
                ->exporter(PostExporter::class)
                // ->columnMapping(false)
        ];
    }
}
