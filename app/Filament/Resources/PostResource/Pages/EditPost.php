<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\DateTimePicker;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->submit(null)
                ->action('save')
                ->label('Save Changes'),

            // Publish action - only show for drafts
            Actions\Action::make('publish')
                ->label('Publish')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn() => $this->record->published_at === null)
                ->form([
                    DateTimePicker::make('published_at')
                        ->label('Publication Date & Time')
                        ->default(now())
                        ->required()
                        ->native(false),
                ])
                ->action(function (array $data): void {
                    $this->data['published_at'] = $data['published_at'];

                    $this->save(true, false);


                    Notification::make()
                        ->title('Post published successfully!')
                        ->success()
                        ->send();
                }),

            // Unpublish action - only show for published posts
            Actions\Action::make('unpublish')
                ->label('Unpublish')
                ->color('warning')
                ->icon('heroicon-o-arrow-uturn-down')
                ->visible(fn() => $this->record->published_at !== null)
                ->requiresConfirmation()
                ->action(function (): void {
                    $this->data['published_at'] = null;

                    $this->save(true, false);

                    // Notification::make('success', 'Post unpublished and saved as draft!')->send();
                    Notification::make()
                        ->title('Post unpublished and saved as draft!')
                        ->success()
                        ->send();
                }),

            $this->getCancelFormAction(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Post updated successfully!';
    }
}
