<?php

namespace App\Filament\Exports;

use App\Models\Post;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PostExporter extends Exporter
{
    protected static ?string $model = Post::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user_id'),
            ExportColumn::make('title'),
            ExportColumn::make('slug'),
            ExportColumn::make('description')
                ->limit(50),
            ExportColumn::make('body')
                ->limit(100),
            ExportColumn::make('keywords'),
            ExportColumn::make('read_time'),
            ExportColumn::make('category.slug')
                ->label('Category'),
            ExportColumn::make('published_at')
                ->formatStateUsing(fn ($state) => $state->format('F j, Y H:i A')),
            ExportColumn::make('created_at')
                ->formatStateUsing(fn ($state) => $state->format('F j, Y H:i A')),
            ExportColumn::make('updated_at')
                ->formatStateUsing(fn ($state) => $state->format('F j, Y H:i A')),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your post export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

    public function getFileName(Export $export): string
    {
        return "posts-" . now()->format('Y-m-d-H-i-s') . ".csv";
    }
}
