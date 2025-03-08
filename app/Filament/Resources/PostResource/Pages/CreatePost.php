<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\DateTimePicker;
use Filament\Notifications\Notification;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('saveAsDraft')
                ->label('Save as Draft')
                ->color('gray')
                ->icon('heroicon-o-document')
                ->action(function (): void {
                    $this->data['published_at'] = null;
                    
                    $this->create();
                    
                    Notification::make()
                        ->title('Post saved as draft!')
                        ->success()
                        ->send();
                }),
                
            Actions\Action::make('publish')
                ->label('Publish')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->form([
                    DateTimePicker::make('published_at')
                        ->label('Publication Date & Time')
                        ->default(now())
                        ->required()
                        ->native(false),
                ])
                ->action(function (array $data): void {
                    $this->data['published_at'] = $data['published_at'];
                    
                    $this->create();
                    
                    Notification::make()
                        ->title('Post published successfully!')
                        ->success()
                        ->send();
                }),
        ];
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotificationTitle(): ?string
    {
        // This will be overridden by our custom notifications
        return null;
    }
}
