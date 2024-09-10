<?php

namespace App\Livewire\Components;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentsCard extends Component
{
    public int $postId;

    public Collection $comments;

    public function mount()
    {
        $this->comments = Comment::root()
            ->where('post_id', $this->postId)
            ->with('user', 'replies.user')
            ->withCount('likes', 'replies')
            ->get();
    }

    #[On('comment-deleted')]
    public function onCommentDeleted(int $id)
    {
        $this->comments = $this->comments->reject(fn($comment) => $comment->id === $id);
    }

    #[On('comment-created')]
    public function onCommentCreated(int $id)
    {
        $comment = Comment::find($id);

        if ($comment->isRoot()) {
            $this->comments = $this->comments->push($comment);
        }
    }

    public function render()
    {
        $this->comments->loadMissing('user', 'replies.user');

        $countsToLoad = [];

        if (!isset($this->comments->first()->likes_count)) {
            $countsToLoad[] = 'likes';
        }

        if (!isset($this->comments->first()->replies_count)) {
            $countsToLoad[] = 'replies';
        }

        if (!empty($countsToLoad)) {
            $this->comments->loadCount($countsToLoad);
        }

        return view('livewire.components.comments-card');
    }
}
