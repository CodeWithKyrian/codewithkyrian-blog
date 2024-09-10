<?php

namespace App\Livewire\Components;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;
    public ?Comment $parent;
    public bool $allowReply = false;
    public bool $showReplies = false;
    public bool $isLiked = false;
    public bool $showReplyForm = false;
    public bool $isEditing = false;

    public function mount()
    {
        if (Auth::check()) {
            $this->isLiked = $this->comment->isLikedBy(Auth::user());
        }
        $this?->comment->loadMissing('user', 'replies')->loadCount('likes', 'replies');

    }

    public function toggleReplies()
    {
        $this->showReplies = !$this->showReplies;
    }

    public function toggleLike()
    {
        $user = Auth::user();

        if (!$user) {
            return;
        }

        if ($this->isLiked) {
            $this->comment->unlike($user);
        } else {
            $this->comment->like($user);
        }

        $this->isLiked = !$this->isLiked;
        $this->comment->refresh();
        $this->comment->loadCount('likes');
    }

    public function toggleReplyForm()
    {
        $this->showReplyForm = !$this->showReplyForm;
        $this->isEditing = false;
    }

    public function closeReplyForm()
    {
        $this->showReplyForm = false;
    }

    public function startEditing()
    {
        $this->isEditing = true;
        $this->showReplyForm = false;
    }

    #[On('comment-created')]
    public function onCommentCreated($commentId, $parentId)
    {
        if ($this->comment->id !== $parentId)  return;

        $this->showReplyForm = false;
        $this->showReplies = true;
    }

    #[On('comment-updated')]
    public function onCommentUpdated($id, $content)
    {
        if ($this->comment->id === $id) {
            $this->isEditing = false;
            $this->comment->content = $content;
        }
    }

    #[On('comment-deleted')]
    public function onCommentDeleted(int $id, ?int $parentId = null)
    {
        if ($this->comment->id === $parentId) { 
            $this->comment->replies->reject(fn($comment) => $comment->id === $id);
        }
    }

    #[On('cancel-edit')]
    public function onEditCancelled()
    {
        $this->isEditing = false;
    }

    public function deleteComment()
    {
        $this->comment->delete();
        $this->dispatch('comment-deleted', $this->comment->id, $this->comment->parent_id);
    }

    public function render()
    {
        return view('livewire.components.comment-item');
    }
}
