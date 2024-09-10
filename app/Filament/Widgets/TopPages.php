<?php

namespace App\Filament\Widgets;

use App\Models\TopPages as TopPagesModel;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopPages extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(TopPagesModel::query())
            ->columns([
                Tables\Columns\TextColumn::make('S/N')
                    ->label('S/N')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('page'),
                Tables\Columns\TextColumn::make('visitors')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pageviews')
                    ->label('Page Views')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('View')
                    ->icon('heroicon-o-eye')
                    ->url(fn($record) => config('app.frontend_url') . $record->page)
                    ->openUrlInNewTab(),
            ]);
    }
}
