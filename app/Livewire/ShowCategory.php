<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\View\View;
use Livewire\Component;

class ShowCategory extends Component
{
    public Category $category;

    public function mount(): void
    {
        $this->category->load(['posts.tags']);
    }

    public function render(): View
    {
        return view('livewire.show-category');
    }
}
