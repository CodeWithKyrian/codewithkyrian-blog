@props(['posts'])
<div class="mb-6 card">
    <h2 class="card-title">Related Posts</h2>
    <ul class="">
        @foreach ($posts as $post)
            <li class="py-4">
                <a wire:navigate href="{{ route('post.show', $post) }}" class="flex items-center group">
                    <div class="w-1/3">
                        {!! $post->thumbnail->img()->attributes([
                            'id' => \Illuminate\Support\Str::uuid(),
                            'loading' => 'lazy',
                            'class' => 'rounded',
                        ]) !!}
                    </div>
                    <div class="w-2/3 p-2">
                        <h3
                            class="mb-2 text-sm font-semibold tracking-tight text-zinc-900 dark:text-white group-hover:text-blue-800">
                            {{ $post->title }}
                        </h3>
                        <span class="block text-xs text-zinc-500 dark:text-zinc-400">{{ $post->published_at }} <span
                                class="mx-1">•</span> {{ $post->read_time }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="flex justify-center mt-4">
        <a wire:navigate href="{{ route('home') }}"
            class="flex items-center justify-center px-6 py-3 text-sm font-bold text-white uppercase bg-blue-800 rounded hover:bg-blue-700">
            See More
        </a>
    </div>
</div>
