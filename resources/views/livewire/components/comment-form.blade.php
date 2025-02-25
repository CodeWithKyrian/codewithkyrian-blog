<div>
    @auth
        <form wire:submit.prevent="saveComment" class="mb-6">
            @if ($isReply && !$isEditing)
                <div class="mb-2 text-sm text-zinc-500 dark:text-zinc-400">
                    Replying to {{ $parentComment->user->name }}
                    <button type="button" wire:click="$parent.closeReplyForm()"
                        class="ml-2 text-blue-500 hover:text-blue-700">Cancel</button>
                </div>
            @endif
            <textarea wire:model.defer="content" rows="4"
                placeholder="{{ $isEditing ? 'Edit your comment...' : ($isReply ? 'Write your reply...' : 'Write a comment...') }}"
                class="block w-full p-4 text-sm bg-transparent border rounded-t-lg text-zinc-700 dark:text-zinc-300 border-zinc-200 dark:border-zinc-700/60"></textarea>
            @error('content')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <div class="flex justify-end p-3 border border-t-0 rounded-b-lg border-zinc-200 dark:border-zinc-700/60">
                @if ($isEditing)
                    <button type="button" wire:click="$dispatch('cancel-edit')"
                        class="px-4 py-2 mr-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                        Cancel
                    </button>
                @endif
                <button type="submit"
                    class="px-6 py-2 text-sm font-bold text-white uppercase bg-blue-800 rounded hover:bg-blue-700">
                    {{ $isEditing ? 'Update Comment' : ($isReply ? 'Post Reply' : 'Post Comment') }}
                </button>
            </div>
        </form>
    @else
        <div class="p-4 mb-6 text-center">
            <p class="mb-4 text-zinc-700 dark:text-zinc-300">Would you like to say something? Please log in to join
                the discussion.</p>
            <a href="{{ route('socialite.auth', ['provider' => 'github', 'redirect' => url()->current(), '#comment-form']) }}"
                class="inline-flex items-center px-6 py-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-zinc-800 dark:bg-zinc-200 dark:text-zinc-800 hover:bg-zinc-700 dark:hover:bg-zinc-300 active:bg-zinc-900 dark:active:bg-zinc-400 focus:outline-none focus:border-zinc-900 dark:focus:border-zinc-500 focus:ring ring-zinc-300 dark:ring-zinc-700 disabled:opacity-25">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Login with GitHub
            </a>
        </div>
    @endauth
</div>
