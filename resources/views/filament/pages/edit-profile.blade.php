<x-filament-panels::page>
    <x-filament-panels::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}
        <div class="fi-form-actions">
            <div class="flex flex-row-reverse flex-wrap items-center gap-3 fi-ac">
                <x-filament::button type="submit">
                    Save
                </x-filament::button>
            </div>
       </div>
    </x-filament-panels::form>
    <x-filament-panels::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}
         <div class="fi-form-actions">
            <div class="flex flex-row-reverse flex-wrap items-center gap-3 fi-ac">
                <x-filament::button type="submit">
                    Save
                </x-filament::button>
            </div>
       </div>
    </x-filament-panels::form>
</x-filament-panels::page>
