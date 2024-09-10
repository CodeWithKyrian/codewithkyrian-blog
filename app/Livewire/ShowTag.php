<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Component;

class ShowTag extends Component
{
    public Tag $tag;

    public function mount() : void
    {
        $this->tag->load(['posts' => ['category', 'tags']]);
    }

    public function render() : View
    {
        return view('livewire.show-tag')
            ->title($this->tag->name . ' Posts');
    }
}
