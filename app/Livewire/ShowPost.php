<?php

namespace App\Livewire;

use App\Models\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\View\View;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount(): void
    {
        $this->post->loadMissing(['category', 'thumbnail', 'tags']);
        $this->post->body = $this->parseMarkdown($this->post->body);
    }

    public function render(): View
    {
        $relatedPosts = Post::where('id', '!=', $this->post->id)
            ->where(function ($query) {
                $query->where('category_id', $this->post->category_id)
                    ->orWhereHas('tags', function ($query) {
                        $query->whereIn('id', $this->post->tags->pluck('id'));
                    });
            })
            ->with('category', 'thumbnail')
            ->withCount(['tags' => function ($query) {
                $query->whereIn('id', $this->post->tags->pluck('id'));
            }])
            ->orderByDesc('tags_count')
            ->take(6)
            ->get();

        return view('livewire.show-post', compact('relatedPosts'))
            ->title($this->post->title);
    }

    public function parseMarkdown($markdown)
    {
        return Markdown::convert($markdown)->getContent();
    }
}
