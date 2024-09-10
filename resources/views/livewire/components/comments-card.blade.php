<div class="mb-6">

    <h3 class="mb-5 font-bold tracking-tight xl md:text-2xl text-zinc-800 dark:text-zinc-300">
        {{ $comments->count() }} {{ Str::plural('Comment', $comments->count()) }}
    </h3>

    <div class="mb-4">
        @forelse ($comments as $comment)
            <livewire:components.comment-item :comment="$comment" :allow-reply="true" :show-replies="true" :key="$comment->id" />
        @empty
            <p class="text-zinc-500 dark:text-zinc-400">No comments yet. Be the first to comment!</p>
        @endforelse
    </div>

    <livewire:components.comment-form :post-id="$postId" />
</div>
