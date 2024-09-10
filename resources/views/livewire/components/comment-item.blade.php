<div class="">
    @if ($isEditing)
        <livewire:components.comment-form :post="$comment->post" :editing-comment="$comment" :key="'edit-' . $comment->id" />
    @else
        <div class="mb-4 card">
            <div class="flex items-center mb-2">
                <img src="{{ $comment->user->avatar }}" alt="avatar"
                    class="w-12 h-12 mr-2 rounded-full">

                <div class="ml-2">
                    <h4 class="text-base font-bold md:text-lg text-zinc-800 dark:text-zinc-300">
                        {{ $comment->user->name }}</h4>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <p class="mb-2 text-zinc-700 dark:text-zinc-300">{{ $comment->content }}</p>

            <div class="flex items-center">
                <button wire:click="toggleLike"
                    class="px-2 py-1 text-sm text-gray-500 duration-200 border rounded-md {{ $isLiked ? 'bg-blue-100 dark:bg-blue-900 border-blue-300 dark:border-blue-700' : 'border-zinc-200 dark:border-zinc-700/60' }} dark:text-gray-400 hover:scale-105 active:scale-95">
                    {{ $comment->likes_count }} 👍🏻
                </button>

                @if ($allowReply)
                    <span class="ml-2 text-zinc-200 dark:text-gray-700/60">|</span>

                    <button wire:click="toggleReplies" class="flex items-center ml-1">
                        <span class="ml-2 text-sm text-zinc-400 dark:text-zinc-500">
                            {{ $comment->replies_count ?? 0 }} {{ Str::plural('reply', $comment->replies_count ?? 0) }}
                        </span>
                        <svg class="w-4 h-4 ml-1 text-zinc-400 dark:text-zinc-500 transition-transform duration-200 ease-in-out {{ $showReplies ? 'rotate-180' : '' }}"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <button wire:click="toggleReplyForm" type="button"
                        class="ml-2 text-blue-500 hover:text-blue-700 focus:outline-none">
                        Reply
                    </button>
                @endif

                @if (auth()->id() === $comment->user_id)
                    <button wire:click="startEditing" type="button"
                        class="ml-2 text-yellow-500 hover:text-yellow-700 focus:outline-none">
                        Edit
                    </button>
                    <button wire:click="deleteComment" type="button"
                        class="ml-2 text-red-500 hover:text-red-700 focus:outline-none">
                        Delete
                    </button>
                @endif
            </div>
        </div>
    @endif

    @if ($showReplyForm)
        <div class="mt-4 ml-8">
            <livewire:components.comment-form 
                :post-id="$comment->post_id" 
                :parent-comment="$comment" 
                :key="'reply-' . $comment->id"
                 />
        </div>
    @endif

    @if ($showReplies && $comment->replies->count() > 0)
        <div class="mt-4 ml-8">
            @foreach ($comment->replies as $reply)
                <livewire:components.comment-item :comment="$reply" :key="$reply->id" />
            @endforeach
        </div>
    @endif
</div>
