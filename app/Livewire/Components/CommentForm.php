<?php

namespace App\Livewire\Components;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentForm extends Component
{
    public int $postId;

    public ?Comment $parentComment = null;

    public ?Comment $editingComment = null;

    public string $content = '';

    public bool $isReply = false;

    public bool $isEditing = false;

    protected $rules = [
        'content' => 'required|min:3',
    ];

    public function mount()
    {
        $this->isReply = $this->parentComment !== null;
        $this->isEditing = $this->editingComment !== null;
        if ($this->isEditing) {
            $this->content = $this->editingComment->content;
        }
    }

    public function saveComment()
    {
        $this->validate();

        if ($this->isEditing) {
            $this->editingComment->update(['content' => $this->content]);
            $this->dispatch('comment-updated', $this->editingComment->id, $this->content);
        } else {
            $comment = Comment::create([
                'content' => $this->content,
                'user_id' => Auth::id(),
                'post_id' => $this->postId,
                'parent_id' => $this->parentComment?->id,
            ]);

            // if ($this->isReply) {
            //     $this->dispatch('replyPosted', $this->parentComment->id);
            // } else {
            //     $this->dispatch('commentPosted', $this->postId);
            // }
            $this->dispatch('comment-created', $comment->id, $this->parentComment?->id);
        }

        $this->content = '';
        $this->editingComment = null;
        $this->isEditing = false;
    }

    #[On('cancel-edit')]
    public function cancelEdit()
    {
        $this->content = '';
        $this->editingComment = null;
        $this->isEditing = false;
    }

    #[On('editStarted')]
    public function handleEditStarted($commentId)
    {
        $this->isEditing = true;
        $this->editingComment = Comment::find($commentId);
    }

    public function render()
    {
        return view('livewire.components.comment-form');
    }
}
